<x-layout>
    <h2>Create Page</h2>

    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <h2 class="text-3xl font-bold text-gray-800 mb-2">
                Create New Task
            </h2>

            <p class="text-gray-500 mb-8">
                Fill in the details below to add a new task.
            </p>

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <!-- Task Name -->
                <div class="mb-5">
                    <label for="task_name" class="block font-semibold mb-2">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="e.g. Finish Laravel Assignment"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none"
                    >
                </div>

                <!-- Priority -->
                <div class="mb-5">
                    <label for="priority" class="block font-semibold mb-2">
                        Priority
                    </label>

                    <select
                        id="priority"
                        name="priority"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                        
                    >
                        <option value="" disabled {{ old('priority') == '' ? 'selected' : '' }}>Choose priority</option>
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>🟢 Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>🟡 Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>🔴 High</option>
                    </select>
                </div>

                <!-- Due Date -->
                <div class="mb-5">
                    <label for="due_date" class="block font-semibold mb-2">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none"
                    >
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <label for="description" class="block font-semibold mb-2">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Write a short description of the task..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 resize-none focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none"
                    >{{ old('description') }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">

                    <a
                        href="/tasks"
                        class="px-6 py-3 rounded-lg bg-gray-200 hover:bg-gray-300 transition"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition"
                    >
                        Create Task
                    </button>

                </div>

                @if( $errors->any())
                    <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Error!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>

        </div>

    </div>
</x-layout>