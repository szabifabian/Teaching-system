@extends('layouts.app')


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
                </div>
            
            </div>

                <div class="card-body">
                <p class="font-weight-bold">Név: {{ $data->name }}</p>
                <p class="font-weight-bold">Leírás: {{ $data->about }}</p>
                <p class="font-weight-bold">Kód: {{ $data->subject_code }}</p>
                <p class="font-weight-bold">Kreditérték: {{ $data->credit }}</p>
                <p class="font-weight-bold">Létrehozva: {{ $data->created_at }}</p>
                <p class="font-weight-bold">Módosítva: {{ $data->updated_at }}</p>
                </div>
            </div>
        </div>

    </div>
@endif
@endsection