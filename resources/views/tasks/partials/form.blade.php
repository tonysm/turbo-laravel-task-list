<form x-data="{
    submitByKeyboard(event) {
        if (event.shiftKey) return
        event.preventDefault()
        $el.closest('form').requestSubmit()
    }
}" x-on:keydown.esc="$refs.cancel.click()" action="{{ isset($taskList) ? route('task-lists.tasks.store', $taskList) : route('tasks.update', $task) }}" method="post" class="w-full pt-2 pb-4 mb-2 rounded-md border border-gray-300 dark:border-gray-700 focus-within:ring-2 ring-indigo-500 dark:ring-indigo-600 native:focus-within:ring-0 native:border-0">
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

    <div class="mt-4 pl-3">
        <x-primary-button type="submit">{{ isset($task) ? __('Save') : __('Add this task') }}</x-primary-button>
        <a x-ref="cancel" href="{{ route('dashboard') }}" class="inline-flex native:hidden items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Cancel') }}</a>
    </div>
</form>
