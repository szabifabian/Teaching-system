@extends('layouts.app')

@section('title', 'Feladatok')

@section('content')

    <h1>Aktív feladatok listája tárgyanként</h1>
    @if(Auth::user()->role == "student")
    <div class="container">
        @if(isset($active_tasks))
        {{$saved = null}}
        @foreach($active_tasks as $at)
            @if(Auth::user()->hasTheSubject($at->taskToSubject) == true)
            @if($at->subject_id != $saved)
                <h4>{{$at->taskToSubject->name}}</h4>
            @endif
            <div style="display:none">{{$saved = $at->subject_id}}</div>
            <div class="list-group-item list-group-item-action flex-column align-items-center">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-1">
                        <a href="{{ route('task-info', ['id' => $at->id]) }}">{{ $at->name }}</a>
                    </h5>
                   
                </div>
            </div>


            @endif
        @endforeach
        @endif

    </div>
    @endif
@endsection