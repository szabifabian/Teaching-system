@extends('layouts.app')

@section('title', 'Feladat részletei')

@section('content')
@if ($data == null)
        <div class="alert alert-danger text-center">
            Az elem nem található
        </div>
@else
    <div class="container">

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
                    <p class="font-weight-bold">Beadott megoldások száma: 0</p>
                    <p class="font-weight-bold">Értékelt megoldások száma: 0</p>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection