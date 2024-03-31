<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class);
    }

    public function toggleCompletion(): void
    {
        $this->update([
            'completed_at' => $this->completed_at ? null : now(),
        ]);
    }

    protected function completed(): Attribute
    {
        return Attribute::get(fn () => ! is_null($this->completed_at));
    }
}
