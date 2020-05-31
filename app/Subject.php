<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    //php artisan make:model NAME
    use SoftDeletes;

    protected $table = 'subjects'; //vajon kell?

    protected $fillable = [
        'subject_code', 'name', 'credit', 'user_id', 'about',
    ];

    public function subjectToTeacher(){
        return $this->belongsTo(User::class, 'user_id', 'id');  //egy tárgy csak egy tanárhoz tartozik
    }

    public function students(){
        return $this->belongsToMany(User::class); //egy tárgy több diákhoz is tartozhat
    }

    public function tasks(){
        return $this->hasMany(Task::class); //egy tárgyhoz több feladat is tartozik
    }

}
