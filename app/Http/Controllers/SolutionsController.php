<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Task;
use App\Solution;
use Illuminate\Support\Facades\DB;

class SolutionsController extends Controller
{
    //
    public function editSolution($id) {
        return view('add-solution-grade', ['data' => Solution::find($id)]);
    }


    public function validateSolution(Request $request, $id) {

        $validated = $request->validate([
            'answer' => 'required',
            
        ]);
        Solution::create([
            'user_id' => Auth::user()->id,
            'task_id' => $id,
            'answer' => $request->input('answer'),
            
        ]);
        return redirect(route('task-info', $id));
    }

    public function validateEditSolution(Request $request){
        
        $validated = $request->validate([
            'grade' => 'required|numeric|min:1',
            'comment' => 'max:500',
            'answer' => 'required'
        ]);

        $solution_item = Solution::find($request->input('id'));
        $solution_item->update([
            'grade' => $request->input('grade'),
            'comment' => $request->input('comment'),
            'answer' => $request->input('answer')
        ]);
        return view('home');
    }
}
