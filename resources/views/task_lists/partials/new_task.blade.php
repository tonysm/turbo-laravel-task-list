<a data-turbo-frame="{{ dom_id($taskList, 'create_task') }}" href="{{ route('task-lists.tasks.create', $taskList) }}" title="{{ __('Add Task') }}" class="mt-1 mb-4 inline-flex items-center p-2 dark:bg-gray-900 dark:text-gray-400 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>

    <div>{{ __('Add Task') }}</div>
</a>
