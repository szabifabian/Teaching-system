<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'subject_id', 'name', 'about', 'score', 'starting_at', 'ending_at'
    ];

    public function taskToSubject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id'); //egy feladat csak egy tárgyhoz tartozik
    }

    //kell majd egy Answer modell....egy feladathoz több megoldás is tartozik
}
