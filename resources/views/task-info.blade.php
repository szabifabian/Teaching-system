@extends('layouts.app')

@section('title', 'Feladat részletei')

@section('content')
@if ($data == null)
        <div class="alert alert-danger text-center">
            Az elem nem található
        </div>
@else
    <div class="container">
        @if(Auth::user()->role == "teacher")
        <div class="col-md-8-center">
            <div class="card">
            <div class="card-header">A(z) <b>{{$data->name}}</b> feladat részletei
                <div class="btn-group">
                @if(Auth::user()->role == "teacher")
                <a class="dropdown-item" href="{{route('edit-task', $data['id'])}}">
                    <button class="btn btn-lg btn-primary">Módosítás
                    </button>
                </a>
                @endif
                    </div>
                </div>

                <div class="card-body">
                    <p class="font-weight-bold">Név: {{ $data->name }}</p>
                    <p class="font-weight-bold">Leírás: {{ $data->about }}</p>
                    <p class="font-weight-bold">Pontérték: {{ $data->score }}</p>
                    <p class="font-weight-bold">Határidő: {{ $data->starting_at }}-tól {{ $data->ending_at }}-ig</p>
                    <p class="font-weight-bold">Beadott megoldások száma: {{ DB::table('solutions')->where('task_id', $data->id)->count()}}</p>
                    <p class="font-weight-bold">Értékelt megoldások száma: 0</p>
                </div>
            </div>
        </div>
            <h1>Beadott megoldások</h1>
            @foreach($answers_to_task as $answer)
            <div class="list-group-item list-group-item-action flex-column align-items-center">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1">
                        Beadás dátuma: {{ $answer->created_at}}
                    </h6>
                    <h6 class="mb-1">
                        Diák neve: {{ $answer->user->name}}
                    </h6>
                    <h6 class="mb-1">
                        E-mail cím: {{ $answer->user->email}}
                    </h6>
                    <a class="text-white" href="{{route('add-solution-grade', $answer['id'])}}">
                        <button class="btn btn-sm btn-primary">Értékelés</button>
                    </a>
                </div>
            </div>
            @endforeach
        @else
        <!--Diák-->
        <div class="col-md-8-center">
            <div class="card">
            <div class="card-header">A(z) <b>{{$data->name}}</b> feladat részletei
                </div>

                <div class="card-body">
                    <p class="font-weight-bold">Tárgy neve: {{ $data->taskToSubject->name }}</p>
                    <p class="font-weight-bold">Tanár neve: {{ $data->taskToSubject->subjectToTeacher->name }}</p>
                    <details open><summary>Feladat leírása: </summary><p class="font-weight-bold"> {{ $data->about }}</p></details>
                    <p class="font-weight-bold">Elérhető pontszám: {{ $data->score }}</p>
                    <p class="font-weight-bold">Határidő: {{ $data->starting_at }}-tól {{ $data->ending_at }}-ig</p>
                </div>
            </div>
        </div>
        <h1>Feladat beadása</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <p>A validáció során az alábbi hibák történtek:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('add-solution-post', ['id' => $data->id])}}" method="post" class="card py-2 px-4">
            @csrf
            <div class="form-group">
                <label for="about">Megoldás</label>
                <textarea id="answer" name="answer" rows="15" type="text" class="form-control"></textarea>
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn btn-lg btn-primary">Beadás</button>
            </div>

        </form>

        @endif
    </div>
@endif
@endsection