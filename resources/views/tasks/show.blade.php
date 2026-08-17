<x-layout>
    <h2>{{ $task->task_name}}</h2>

    



<div class="container mx-auto max-w-3xl px-6 py-10">

    <div class="bg-white rounded-xl shadow-lg border border-gray-200">

        <div class="border-b px-8 py-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $task->task_name }}
            </h1>

            @if($task->completed)
                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-semibold">
                    Completed
                </span>
            @else
                <span class="bg-yellow-100 text-yellow-700 px-4 py-1 rounded-full text-sm font-semibold">
                    Pending
                </span>
            @endif
        </div>

        <div class="p-8 space-y-6">

            <!-- Priority -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-1">
                    Priority
                </h2>

                @if($task->priority == 'high')
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                        High
                    </span>
                @elseif($task->priority == 'medium')
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                        Medium
                    </span>
                @else
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                        Low
                    </span>
                @endif
            </div>

            <!-- Description -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">
                    Description
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    {{ $task->description ?? 'No description provided.' }}
                </p>
            </div>

            <!-- Due Date -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">
                    Due Date
                </h2>

                <p class="text-gray-700">
                    {{ $task->due_date ?? 'No due date set.' }}
                </p>
            </div>

            <!-- Created -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">
                    Created At
                </h2>

                <p class="text-gray-700">
                    {{ $task->created_at->format('F d, Y') }}
                </p>
            </div>

            <!-- Updated -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">
                    Last Updated
                </h2>

                <p class="text-gray-700">
                    {{ $task->updated_at->format('F d, Y') }}
                </p>
            </div>

        </div>

        <div class="border-t px-8 py-6 flex flex-wrap items-center justify-between gap-3">

            <a href="{{ route('tasks.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition">
                ← Back
            </a>

            <div class="flex flex-wrap items-center gap-2">
                <form action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-5 py-2 rounded-lg {{ $task->completed ? 'bg-gray-200 text-gray-700' : 'bg-green-600 text-white hover:bg-green-700' }} transition">
                        {{ $task->completed ? 'Mark as Pending' : 'Mark as Completed' }}
                    </button>
                </form>

                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                   class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                    Edit Task
                </a>

                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                        Delete Task
                    </button>
                </form>
            </div>
    
        </div>

    </div>

</div>


</x-layout>