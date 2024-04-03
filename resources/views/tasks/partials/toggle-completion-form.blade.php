<form x-data action="{{ route('tasks.completed.update', $task) }}" method="post" class="z-10">
    @csrf
    @method('PUT')

    <input class="p-2.5 border-0 rounded-md bg-gray-200 dark:bg-white ring-indigo-500 dark:ring-indigo-600 native:ring-0 accent-indigo-500 dark:accent-indigo-600 focus:outline-none focus:border-0" type="checkbox" x-on:keydown.enter.prevent="$el.checked = !$el.checked; $el.closest('form').requestSubmit()" x-on:change="$el.closest('form').requestSubmit()" @if ($task->completed) checked @endif />
    <button type="submit" class="sr-only" tabindex="-1">{{ __('Save') }}</button>
</form>
