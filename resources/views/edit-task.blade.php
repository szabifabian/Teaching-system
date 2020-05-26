@extends('layouts.app')

@section('title', 'Feladat módosítása')

@section('content')
    <h1 class="text-center my-4">
        Feladat módosítása
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

    <form action="{{ route('update-task-post') }}" method="post" class="card py-2 px-4">
        @csrf
        <input type="hidden" name="id" id="id" value="{{old('id', $data->id)}}">

        <div class="form-group">
            <label for="name">Név</label>
            <input name="name" type="text" class="form-control" value="{{old('name', $data->name)}}">
        </div>
        <div class="form-group">
            <label for="score">Pontérték</label>
            <input id="score" name="score" type="number" class="form-control" min="1" value="{{old('score', $data->score)}}">
        </div>
        <div class="form-group">
            <label for="about">Leírás</label>
            <textarea id="about" name="about" rows="4" type="text" class="form-control" autocomplete="about">{{old('about', $data->about)}}</textarea>
        </div>
        <label>Határidő</label>
        <div class="input-group input-daterange">  
            <input type="date" class="form-control" id="starting_at" name="starting_at" value="{{old('score', $data->starting_at)}}">
            <div class="input-group-addon">-tól</div>
            <input type="date" class="form-control" id="ending_at" name="ending_at" value="{{old('score', $data->ending_at)}}">
            <div class="input-group-addon">-ig</div>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-lg btn-primary">Mentés</button>
        </div>

    </form>
@endsection