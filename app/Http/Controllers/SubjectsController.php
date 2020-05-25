<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subject;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Task;

class SubjectsController extends Controller
{
    //
   public function indexAll() {
        $subjects = Subject::all()->where('public', true)->diff(Auth::user()->subjects);
        return view('subjects-list')->with('subjects', $subjects);
    }

    public function indexAdd() {
        
        return view('add-new-subject');
    }
    

    public function validateAddNewSubject(Request $request) {

            $validated = $request->validate([
                'name' => 'required|min:3',
                'subject_code' => 'required|regex:^IK-([A-Z]){3}\d\d\d^|unique:App\Subject',
                'credit' => 'required|numeric|min:1',
                'about' => 'max:100'
            ]);
            Subject::create([
                'name' => $request->input('name'),
                'subject_code' => $request->input('subject_code'),
                'credit' => $request->input('credit'),
                'user_id' => Auth::user()->id,
                'about' => $request->input('about'),
            ]);
            return redirect('home');
    }


    public function validateEditSubject(Request $request){
        
            $validated = $request->validate([
                'name' => 'required|min:3',
                'subject_code' => 'required|regex:^IK-([A-Z]){3}\d\d\d^',
                'credit' => 'required|numeric|min:1',
                'about' => 'max:100'
            ]);

            $subject_item = Subject::find($request->input('id'));
            $subject_item->update([
                'name' => $request->input('name'),
                'about' => $request->input('about'),
                'subject_code' => $request->input('subject_code'),
                'credit' => $request->input('credit'),
            ]);
            return redirect(route('subject-info', $request->input('id')));
    }

    public function setPublicity($id) {

        $subject_item = Subject::find($id);
        $subject_item->public = !$subject_item->public;
        $subject_item->save();

        //ha a tanár visszavonja a publikálást, akkor akinek már fel volt véve a tárgy annak is eltűnik a felvettek között és nyílván
        //tárgyfelvétel oldalon sem lesz jelen
        DB::table('subject_user')->where('subject_id', $subject_item->id)->delete(); 

        return redirect('home');
    }

    public function info($id) {

        $tasks = Task::all()->where('subject_id', $id)->sortByDesc('ending_at'); //feladatok kilistázása az adott tárgy oldalán, rendezve

        return view('subject-info', ['data' => Subject::find($id), 'tasks' => $tasks]);
    }

    public function edit($id) {
        return view('edit-subject', ['data' => Subject::find($id)]);
    }

    public function delete($id) {
        Subject::find($id)->delete();

        return redirect('home');
    } 

    public function selectSubject($id) {

        Auth::user()->subjects()->attach(Subject::find($id));

        return redirect('home');
    }

    public function unselectSubject($id) {
        Auth::user()->subjects()->detach(Subject::find($id));

        return redirect('home');
    }

}
