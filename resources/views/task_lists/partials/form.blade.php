<form x-ref="form" action="{{ route('task-lists.store') }}" method="post" class="w-full peer-has-[*]:mt-4">
    @csrf

    <div class="flex w-full items-center group rounded-lg border border-gray-300 dark:border-gray-700 overflow-hidden focus-within:ring-2 native:focus-within:ring-0 focus-within:outline-none focus-within:border-indigo-500 dark:focus-within:border-indigo-600 focus-within:ring-indigo-500 dark:focus-within:ring-indigo-600">
        <div class="w-full border-r border-gray-300 dark:border-gray-700">
            <input type="text" name="title" type="text" required placeholder="{{ __('New task list...') }}" class="w-full border-0 dark:bg-gray-900 dark:text-gray-300 group-focus-within:ring-0 group-focus-within:outline-none rounded-l-md" />
        </div>

        <div>
            <button type="submit" class="p-2 block dark:bg-gray-900 dark:text-gray-400 group-focus-within:ring-0 group-focus-within:outline-none rounded-r-md whitespace-nowrap">{{ __('Add Task') }}</button>
        </div>
    </div>
</form>
