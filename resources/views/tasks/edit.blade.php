<x-app-layout :title="__('Edit Task')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12 native:py-0">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-turbo::frame :id="$task" target="_top" data-controller="bridge--delete-form">
                        @include('tasks.partials.form', ['task' => $task])
                        @include('tasks.partials.delete_form', ['task' => $task])
                    </x-turbo::frame>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
