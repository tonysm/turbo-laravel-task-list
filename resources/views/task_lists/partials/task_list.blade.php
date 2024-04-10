<div>
    <x-turbo::frame :id="$taskList" class="w-full text-lg font-semibold">
        @include('layouts.partials.frame_flash')

        <a href="{{ route('task-lists.edit', $taskList) }}">
            {{ $taskList->title }}
        </a>
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
