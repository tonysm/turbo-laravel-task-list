<x-app-layout :title="__('New Task List')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Task List') }}
        </h2>
    </x-slot>

    <div class="py-12 native:py-0">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <x-turbo::frame id="create_task_list" target="_top">
                        @include('task_lists.partials.form')
                    </x-turbo::frame>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
