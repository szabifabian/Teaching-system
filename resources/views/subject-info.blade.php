@extends('layouts.app')

@section('title', 'Tárgy részletei')

@section('content')
@if ($data == null)
        <div class="alert alert-danger text-center">
            Az elem nem található
        </div>
@else
    <div class="container">

        <div class="col-md-8-center">
            <div class="card">
            <div class="card-header">A(z) <b>{{$data->name}}</b> tárgy részletei
                <div class="btn-group">
                @if(Auth::user()->role == "teacher")
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Műveletek
                    </button>
                    
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">Elérhető műveletek</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('edit-subject', $data['id'])}}">
                                <i class="far fa-edit text-success"></i> Módosítás
                            </a>
                            <a class="dropdown-item" href="{{route('delete-subject', $data['id'])}}">
                                <i class="far fa-trash-alt text-danger"></i> Törlés
                            </a>
                        </div>
                    @endif
                </div>
            
            </div>

                <div class="card-body">
                <p class="font-weight-bold">Név: {{ $data->name }}</p>
                <p class="font-weight-bold">Leírás: {{ $data->about }}</p>
                <p class="font-weight-bold">Kód: {{ $data->subject_code }}</p>
                <p class="font-weight-bold">Kreditérték: {{ $data->credit }}</p>
                <p class="font-weight-bold">Létrehozva: {{ $data->created_at }}</p>
                <p class="font-weight-bold">Módosítva: {{ $data->updated_at }}</p>
                <p class="font-weight-bold">Jelentkezett hallgatók száma: {{ DB::table('subject_user')->where('subject_id', $data->id)->count() }}</p>
                @if(Auth::user()->role == "student")
                <p class="font-weight-bold">Tanár neve: {{ $data->subjectToTeacher->name }}, e-mail címe: {{ $data->subjectToTeacher->email }}</p>
                @endif
                <p class="font-weight-bold">Tárgyra jelentkezettek:</p>
                <ul>   
                    @foreach($data->students as $student)
                        <li>{{ $student->name }}, <b>e-mail:</b> {{ $student->email }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
        @if(Auth::user()->role == "teacher")

            <h1>Feladatok listája</h1>
            <a href={{route('add-new-task-form', $data->id)}}>
                <button type="button" class="btn btn-outline-success">Új feladat</button>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Név</th>
                        <th scope="col">Pontszám</th>
                        <th scope="col">Mettől</th>
                        <th scope="col">Meddig</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($tasks))
                        @foreach($tasks as $task)
                            @if($task->starting_at > date(now()))
                                <tr class="p-3 mb-2 bg-warning text-dark">
                            @elseif($task->starting_at < date(now()) && $task->ending_at > date(now()))
                                <tr class="p-3 mb-2 bg-success text-white">
                            @else 
                                <tr class="p-3 mb-2 bg-danger text-white">
                            @endif
                            <th scope="row">{{ $loop->index + 1 }}.</th>
                            <td><a href="{{ route('task-info', ['id' => $task->id]) }}" class="text-white">{{ $task->name }}</a></td>
                            <td>{{ $task->score }}</td>
                            <td>{{ $task->starting_at }}</td>
                            <td>{{ $task->ending_at }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @else 
            <!--diákoldal-->
            <h1>A tárgy aktív feladatai</h1>
            @if (isset($tasks))
            <div class="list-group">
                @foreach($tasks as $task)
                    @if($task->starting_at < date(now()) && $task->ending_at > date(now()))
                    <div class="list-group-item list-group-item-action flex-column align-items-center">
                        <div class="d-flex justify-content-between">     
                            <h6 class="mb-1">
                                Név: <a href="{{ route('task-info', ['id' => $task->id]) }}">{{ $task->name }}</a>
                            </h6>
                            <h6 class="mb-1">
                                Pontérték: {{ $task->score }}
                            </h6>
                            <h6 class="mb-1">
                                Határidő: {{ $task->starting_at }}-tól {{ $task->ending_at }}-ig
                            </h6>
                                @if(DB::table('solutions')->where('task_id', $task->id)->where('user_id', Auth::user()->id)->count() > 0)
                                    <p class="text-green">Beadva</p>
                                @else
                                    <p class="text-red">Nincs beadva</p>
                                @endif
                        </div>
                    </div>
                    
                    @endif
                @endforeach
            </div>
            @endif

        @endif

    </div>
@endif
@endsection