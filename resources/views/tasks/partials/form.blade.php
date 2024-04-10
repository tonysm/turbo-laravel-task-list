<form
    data-controller="bridge--form"
    data-action="turbo:submit-start->bridge--form#submitStart turbo:submit-end->bridge--form#submitEnd"
    x-data="{
        submitByKeyboard(event) {
            if (event.shiftKey) return
            event.preventDefault()
            $el.closest('form').requestSubmit()
        }
    }"
    x-on:keydown.esc="$refs.cancel.click()"
    action="{{ isset($taskList) ? route('task-lists.tasks.store', $taskList) : route('tasks.update', $task) }}"
    method="post"
    class="w-full pt-2 pb-4 mb-2 rounded-md border border-gray-300 dark:border-gray-700 focus-within:ring-2 ring-indigo-500 dark:ring-indigo-600 native:focus-within:ring-0 native:border-0"
>
    @csrf

    @if(isset($task))
        @method('PUT')
    @endif

    <div class="pl-3 py-1 flex items-start">
        <div>
            <input @if (($task ?? false) && $task->completed) checked @endif type="checkbox" class="border-0 rounded-md p-2.5 bg-gray-200 dark:bg-white ring-indigo-500 dark:ring-indigo-600 native:focus:ring-0 accent-indigo-500 dark:accent-indigo-600 cursor-not-allowed" x-data x-on:change.prevent.stop="$el.checked = false" />
        </div>

        <div class="w-full">
            <textarea
                data-controller="textarea-autogrow"
                x-on:keydown.enter="submitByKeyboard"
                class="w-full py-0 border-0 px-2 outline-none ring-0 bg-transparent focus:ring-0 focus:outline-none"
                name="title"
                required
                autofocus
                placeholder="{{ ($task ?? false) ? __('Override task...') : __('New task...') }}"
            >{{ old('title', ($task ?? null)?->title) }}</textarea>
        </div>
    </div>

    <div class="mt-4 px-3 flex items-center justify-between native:mt-0 native:pl-0">
        <div class="flex items-center space-x-2">
            <x-primary-button data-bridge--form-target="submit" data-bridge-title="{{ ($task ?? false) ? __('Update') : __('Add') }}" type="submit">{{ isset($task) ? __('Save') : __('Add this task') }}</x-primary-button>
            <a x-ref="cancel" href="{{ route('dashboard') }}" class="inline-flex native:hidden items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Cancel') }}</a>
        </div>

        @if ($task ?? false)
        <x-danger-secondary-button data-bridge--delete-form-target="submit" data-bridge-title="{{ __('Are you sure you want to delete this task?') }}" form="{{ dom_id($task, 'delete_form') }}" type="submit">
            <span class="sr-only">{{ __('Delete Task') }}</span>
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </x-danger-secondary-button>
        @endif
    </div>
</form>
