@extends('layouts.app')

@section('title', 'Tárgyfelvétel')

@section('content')

    <div class="cotainer">
        <h1 class="text-center">Publikus tárgyak</h1>

        <div class="list-group">
            @foreach ($subjects as $subject)
                <div class="list-group-item list-group-item-action flex-column align-items-center">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">
                           {{ $subject->name }}
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
                    @if(Auth::user()->hasTheSubject($subject) == false)
                        <a href={{route('selectSubject', $subject->id)}}>
                            <button type="button" class="btn btn-outline-success">Felvesz</button>
                        </a>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endsection