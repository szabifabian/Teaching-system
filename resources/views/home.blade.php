@extends('layouts.app')

@section('content')
<div class="container">
    @guest
            <!--nothing-->
     @else
            
            @if (Auth::user()->role == "teacher")

                <h1 class="text-center">Tantárgyak</h1>

                <div class="list-group">
                    @foreach ($subjects as $subject)
                        <div class="list-group-item list-group-item-action flex-column align-items-center">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1">
                                    <a href="{{ route('subject-info', ['id' => $subject->id]) }}">{{ $subject->name }}</a>
                                </h5>
                                <h6 class="mb-1">
                                    Leírás: {{ $subject->about }}
                                </h6>
                                <h6 class="mb-1">
                                    Kód: {{ $subject->subject_code }}
                                </h6>
                                <h6 class="mb-1">
                                    Kreditérték: {{ $subject->credit }}
                                </h6>
                                
                            </div>
                            @if (Auth::user()->role == "teacher")
    
                                <a href={{route('setPublicity', $subject->id)}}>
                                @if ($subject->public)
                                    <button type="button" class="btn btn-outline-danger">Publikálás visszavonása</button>
                                @else
                                    <button type="button" class="btn btn-outline-success">Publikálás</button>
                                @endif
                                </a>

                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <h1 class="text-center">Felvett tantárgyaim</h1>

                <div class="list-group">
                    @foreach ($subjects as $subject)
                        <div class="list-group-item list-group-item-action flex-column align-items-center">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1">
                                    <a href="{{ route('subject-info', ['id' => $subject->id]) }}">{{ $subject->name }}</a>
                                </h5>
                                <h6 class="mb-1">
                                    Leírás: {{ $subject->about }}
                                </h6>
                                <h6 class="mb-1">
                                    Kód: {{ $subject->subject_code }}
                                </h6>
                                <h6 class="mb-1">
                                    Kreditérték: {{ $subject->credit }}
                                </h6>
                                <h6 class="mb-1">
                                    Tanár: {{ $subject->subjectToTeacher->name }}
                                </h6>
                            </div>

                            @if(Auth::user()->hasTheSubject($subject))
                                <a href={{route('unselectSubject', $subject->id)}}>
                                <button type="button" class="btn btn-outline-danger">Lead</button>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        @endguest
 
</div>
@endsection
