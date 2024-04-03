<?php

use App\Models\TaskList;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel(TaskList::class, function (User $user, TaskList $taskList) {
    return $user->id === $taskList->user_id;
});
