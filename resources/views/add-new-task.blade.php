@extends('layouts.app')

@section('title', 'Új feladat')

@section('content')
    <h1 class="text-center my-4">
            Új feladat létrehozása
    </h1>

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

    <form action="{{ route('add-new-task-post', ['id' => $tId->id])}}" method="post" class="card py-2 px-4">
        @csrf
        
        <div class="form-group">
            <label for="name">Név</label>
            <input name="name" type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="score">Pontérték</label>
            <input id="score" name="score" type="number" class="form-control" min="1" placeholder="0">
        </div>
        <div class="form-group">
            <label for="about">Leírás</label>
            <textarea id="about" name="about" rows="4" type="text" class="form-control"></textarea>
        </div>
        <label>Határidő</label>
        <div class="input-group input-daterange">  
            <input type="date" class="form-control" id="starting_at" name="starting_at" placeholder="YYYY-MM-DD">
            <div class="input-group-addon">-tól</div>
            <input type="date" class="form-control" id="ending_at" name="ending_at" placeholder="YYYY-MM-DD">
            <div class="input-group-addon">-ig</div>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-lg btn-primary">Létrehoz</button>
        </div>

    </form>
@endsection