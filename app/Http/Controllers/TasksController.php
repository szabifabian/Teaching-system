<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Solution;
use App\Task;
use Illuminate\Support\Facades\DB;

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

    public function validateEditTask(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|min:5',
            'about' => 'required|max:500',
            'score' => 'numeric|min:1',
            'starting_at' => 'date_format:Y-m-d',
            'ending_at' => 'date_format:Y-m-d'
        ]);

        $subject_item = Task::find($request->input('id'));
        $subject_item->update([
            'name' => $request->input('name'),
            'about' => $request->input('about'),
            'score' => $request->input('score'),
            'starting_at' => $request->input('starting_at'),
            'ending_at' => $request->input('ending_at'),
        ]);
        return redirect(route('task-info', $request->input('id')));
    }

    public function editTask($id) {
        return view('edit-task', ['data' => Task::find($id)]);
    }

    public function taskInfo($id){

        $answers_to_task = Solution::all()->where('task_id', $id);

        return view('task-info', ['data' => Task::find($id), 'answers_to_task' => $answers_to_task]);
    }

    public function allActiveTasks(){

        $active_tasks = Task::all()->where(
            'starting_at', '<', Date(now())
            )->where('ending_at', '>', Date(now()))->sortBy('subject_id');

        return view('tasks', ['active_tasks' => $active_tasks]);
    }

}
