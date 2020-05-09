@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @guest
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Üdvözöllek az Oktatási rendszer alkalmazásomban!</div>

                <div class="card-body">
                    <h1>Jelenlegi adatok:</h1>
                <p class="font-weight-bold">Tanárok: {{$teachers}}</p>
                <p class="font-weight-bold">Diákok: {{ $students}}</p>
                <p class="font-weight-bold">Feladatok: 0</p>
                <p class="font-weight-bold">Megoldások száma: 0</p>
                </div>
            </div>
        </div>
        @else
            @if (Auth::user()->role == "teacher")

                <h1>Tantárgyak</h1>

            @endif
        @endguest
    </div>
</div>
@endsection
