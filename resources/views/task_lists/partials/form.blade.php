<form
    x-ref="form"
    action="{{ ($taskList ?? false) ? route('task-lists.update', $taskList) : route('task-lists.store') }}"
    method="post"
    class="w-full peer-has-[*]:mt-4"
    data-controller="form"
>
    @csrf
    @if ($taskList ?? false)
        @method('PUT')
    @endif

    <div class="flex w-full items-center group rounded-lg border border-gray-300 dark:border-gray-700 overflow-hidden focus-within:ring-2 native:focus-within:ring-0 focus-within:outline-none focus-within:border-indigo-500 dark:focus-within:border-indigo-600 focus-within:ring-indigo-500 dark:focus-within:ring-indigo-600">
        <div class="w-full border-r border-gray-300 dark:border-gray-700">
            <input
                data-action="keydown.esc->form#cancelByKeyboard"
                type="text"
                name="title"
                type="text"
                required
                placeholder="{{ __('New task list...') }}"
                @if ($taskList ?? false)
                value="{{ ($taskList ?? null)?->title }}"
                autofocus
                @endif
                class="w-full border-0 dark:bg-gray-900 dark:text-gray-300 group-focus-within:ring-0 group-focus-within:outline-none rounded-l-md"
            />
        </div>

        <div>
            <a data-form-target="cancel" class="sr-only" href="{{ ($taskList ?? false) ? route('task-lists.show', $taskList) : route('dashboard') }}">{{ __('Cancel') }}</a>

            <button
                type="submit"
                class="p-2 block dark:bg-gray-900 dark:text-gray-400 group-focus-within:ring-0 group-focus-within:outline-none rounded-r-md whitespace-nowrap"
            >
                {{ ($taskList ?? false) ? __('Update List') : __('Add List') }}
            </button>
        </div>
    </div>
</form>
