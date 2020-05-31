<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    //
    protected $fillable = [
        'task_id', 'user_id', 'answer', 'grade', 'comment', 'attachment'
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
