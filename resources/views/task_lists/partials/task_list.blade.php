<div>
    <x-turbo::frame :id="$taskList" class="w-full text-lg font-semibold">
        @include('layouts.partials.frame_flash')

        <div class="flex items-center space-x-2 justify-between">
            <div>{{ $taskList->title }}</div>

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div class="sr-only">{{ __('Options') }}</div>

                        <div class="ms-1">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('task-lists.edit', $taskList)">
                        {{ __('Edit') }}
                    </x-dropdown-link>

                    <!-- Delete Lists -->
                    <form method="POST" action="{{ route('task-lists.destroy', $taskList) }}" data-turbo-frame="_top" data-turbo-confirm="{{ __('Are you sure you want to delete this list? All tasks will be removed.') }}">
                        @csrf
                        @method('DELETE')

                        <x-dropdown-button>
                            {{ __('Delete') }}
                        </x-dropdown-button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </x-turbo::frame>

    <div id="@domid($taskList, 'tasks')" class="space-y-4 peer">
        <div class="hidden only:block my-2">
            <p class="pl-4 text-center py-2 rounded-md text-gray-300 dark:text-gray-400 border-dashed border border-gray-300 dark:border-gray-700">{{ __('No tasks yet.') }}</p>
        </div>

        @foreach ($taskList->tasks as $task)
            @include('tasks.partials.task', ['task' => $task])
        @endforeach
    </div>

    <x-turbo::frame :id="[$taskList, 'create_task']" class="block mt-4 peer-has-[*]:mt-1">
        @include('task_lists.partials.new_task', ['taskList' => $taskList])
    </x-turbo::frame>
</div>
