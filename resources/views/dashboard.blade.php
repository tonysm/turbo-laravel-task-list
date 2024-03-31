<x-app-layout>
    <x-slot name="meta">
        <x-turbo::refreshes-with method="morph" scroll="preserve" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="task_lists" class="peer">
                        @foreach ($taskLists as $taskList)
                            @include('task_lists.partials.task_list', ['taskList' => $taskList])
                        @endforeach
                    </div>

                    @include('task_lists.partials.new_task_list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
