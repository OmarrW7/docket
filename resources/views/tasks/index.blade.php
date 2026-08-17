<x-layout>
    <h2>Current Tasks</h2>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <x-card
                    href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    :priority="$task->priority"
                >
                    <div class="flex items-center justify-between gap-4">
                        <h3 class="my-0">{{ $task->task_name }}</h3>

                        @if($task->completed)
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-2.5 py-1 text-sm font-semibold text-green-700">
                                Completed
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-1 text-sm font-semibold text-gray-600">
                                Pending
                            </span>
                        @endif
                    </div>
                </x-card>
            </li>
        @endforeach
    </ul>

    <!-- Pagination -->
    {{ $tasks->links() }}
</x-layout>