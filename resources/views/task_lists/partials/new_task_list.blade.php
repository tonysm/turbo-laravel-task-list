<x-turbo::frame id="create_task_list" x-data x-on:turbo:submit-end="$event.detail.success && $refs.form.reset()" class="native:hidden">
    @include('task_lists.partials.form')
</x-turbo::frame>
