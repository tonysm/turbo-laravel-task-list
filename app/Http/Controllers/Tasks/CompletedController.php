<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;

class CompletedController extends Controller
{
    public function update(Task $task)
    {
        $task->toggleCompletion();

        return back();
    }
}
