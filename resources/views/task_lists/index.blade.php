<x-app-layout :title="__('Tasks')">
    <x-slot name="meta">
        <x-turbo::refreshes-with method="morph" scroll="preserve" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    @foreach ($taskLists as $taskList)
        <x-turbo::stream-from :source="$taskList" />
    @endforeach

    <div class="py-12 native:py-0">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="task_lists" class="peer">
                        @foreach ($taskLists as $taskList)
                            @include('task_lists.partials.task_list', ['taskList' => $taskList])
                        @endforeach
                    </div>

                    @unlessturbonative
                    @include('task_lists.partials.new_task_list', ['taskList' => null])
                    @endunlessturbonative
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
