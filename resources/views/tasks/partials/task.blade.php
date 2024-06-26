<x-turbo::frame :id="$task" class="relative group">
    @include('layouts.partials.frame_flash')

    <div data-completed="@js($task->completed)" class="grow p-3 rounded-md flex items-center space-x-2 ring-indigo-500 dark:ring-indigo-600 focus-within:ring hover:ring native:focus-within:ring-0 native:hover:ring-0">
        <div class="flex items-start space-x-2">
            @include('tasks.partials.toggle-completion-form', ['task' => $task])

            <p class="whitespace-pre-wrap group-has-[[data-completed=true]]:line-through">{{ $task->title }}</p>
        </div>

        <a href="{{ route('tasks.edit', $task) }}" class="native:hidden transition opacity-0 group-hover:opacity-100 focus:opacity-100 focus:ring-0 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>

            <span class="absolute inset-0"></span>
        </a>

        <a href="{{ route('tasks.edit', $task) }}" data-turbo-frame="_top" class="hidden native:inline focus:ring-0 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>

            <span class="absolute inset-0"></span>
        </a>
    </div>
</x-turbo::frame>
