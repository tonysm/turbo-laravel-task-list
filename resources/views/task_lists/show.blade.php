<x-app-layout :title="$taskList->title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $taskList->title }}
        </h2>
    </x-slot>

    <div class="py-12 native:py-0">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    @include('task_lists.partials.task_list', ['taskList' => $taskList])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
