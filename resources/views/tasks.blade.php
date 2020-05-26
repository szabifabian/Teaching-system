@extends('layouts.app')

@section('title', 'Feladatok')

@section('content')

    <h1>Aktív feladatok listája tárgyanként</h1>
    <div class="container">
        @if(isset($active_tasks))
        @foreach($active_tasks as $at)
            @if(Auth::user()->hasTheSubject($at->taskToSubject) == true)
            <h4>{{$at->taskToSubject->name}}</h4>
            <div class="list-group-item list-group-item-action flex-column align-items-center">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-1">
                        {{ $at->name }}
                    </h5>
                   
                </div>
            </div>


            @endif
        @endforeach
        @endif

    </div>
@endsection