<form
    action="{{ route('tasks.destroy', $task) }}"
    method="post"
    id="{{ dom_id($task, 'delete_form') }}"
    data-turbo-frame="_top"
    @unlessturbonative
    data-turbo-confirm="{{ __('Are you sure you want to delete this task?') }}"
    @endunlessturbonative
    data-action="turbo:submit-start->bridge--delete-form#submitStart turbo:submit-end->bridge--delete-form#submitEnd"
>
    @csrf
    @method('DELETE')
</form>
