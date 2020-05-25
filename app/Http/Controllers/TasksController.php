<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Task;

class TasksController extends Controller
{
    //
    public function indexAddTask($taskId){
        $tId = Subject::find($taskId);
        return view('add-new-task')->with('tId', $tId);
    }

    public function validateTask(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required|min:5',
            'about' => 'required|max:500',
            'score' => 'numeric|min:1',
            'starting_at' => 'date_format:Y-m-d',
            'ending_at' => 'date_format:Y-m-d'
            
        ]);
        Task::create([
            'name' => $request->input('name'),
            'subject_id' => $id,
            'about' => $request->input('about'),
            'score' => $request->input('score'),
            'starting_at' => $request->input('starting_at'),
            'ending_at' => $request->input('ending_at'),
            
        ]);
        return redirect(route('subject-info', $id));
    }

}
