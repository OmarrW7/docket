<x-layout>
    <div class="mx-auto max-w-2xl">
        <div class="rounded-xl border border-gray-200 bg-white p-8 shadow">
            <h2 class="mb-2 text-3xl font-bold text-gray-800">Edit Task</h2>
            <p class="mb-8 text-gray-500">Update the task details below.</p>

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="task_name" class="mb-2 block font-semibold">Task Name</label>
                    <input type="text" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}" class="w-full rounded-lg border border-gray-300 px-4 py-3" required>
                </div>

                <div class="mb-5">
                    <label for="priority" class="mb-2 block font-semibold">Priority</label>
                    <select id="priority" name="priority" class="w-full rounded-lg border border-gray-300 px-4 py-3">
                        <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>🟢 Low</option>
                        <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>🟡 Medium</option>
                        <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>🔴 High</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="due_date" class="mb-2 block font-semibold">Due Date</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}" class="w-full rounded-lg border border-gray-300 px-4 py-3">
                </div>

                <div class="mb-8">
                    <label for="description" class="mb-2 block font-semibold">Description</label>
                    <textarea id="description" name="description" rows="6" class="w-full rounded-lg border border-gray-300 px-4 py-3 resize-none">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-8">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="completed" value="1" {{ old('completed', $task->completed) ? 'checked' : '' }}>
                        <span class="font-semibold">Completed</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('tasks.show', $task) }}" class="rounded-lg bg-gray-200 px-6 py-3 transition hover:bg-gray-300">Cancel</a>
                    <button type="submit" class="rounded-lg bg-red-500 px-6 py-3 font-semibold text-white transition hover:bg-red-600">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
