<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        // route --> /tasks/

        // $tasks = Task::all();
        $tasks = Auth::user()->tasks()->latest()->paginate(5);

        return view('tasks.index', [
        'tasks' => $tasks
        ]);
    }

    public function show(Task $task) {
        // route --> /tasks/{task}
        return view('tasks.show', ["task" => $task]);
    }

    public function create() {
        // route --> /tasks/create
        return view('tasks.create');
    }

    public function edit(Task $task) {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task) {
        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'completed' => 'sometimes|boolean',
        ]);

        $task->update($validatedData);

        // event -> notification - email[queues]

        return redirect()->route('tasks.show', $task)->with('success', 'Task updated successfully.');
    }

    public function toggleComplete(Task $task) {
        $task->update(['completed' => ! $task->completed]);

        return back()->with('success', 'Task status updated successfully.');
    }

    public function store(Request $request) {
        // route --> /tasks/ (POST)
        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'completed' => 'sometimes|boolean',
        ]);

        $validatedData['user_id'] = Auth::id();
        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function destroy(Task $task) {
        // route --> /tasks/{id} (DELETE)
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
