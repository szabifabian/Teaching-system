<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $subjects = Auth::user()->subjects;
       
        return view('home', ['subjects' => $subjects]);
    }

    /*public function indexInfos(){

        $num_of_teachers = DB::table('users')->where('role', 'teacher')->count();
        $num_of_students =  DB::table('users')->where('role', 'student')->count();

        return view('home', ['teachers' => $num_of_teachers,  'students' => $num_of_students]);
    }*/
}
