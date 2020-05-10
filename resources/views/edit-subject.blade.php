@extends('layouts.app')

@section('title', 'Tárgy módosítása')

@section('content')
@if ($data == null)
        <div class="alert alert-danger text-center">
            Az elem nem található
        </div>
@else
    <h1 class="text-center my-4">
            Tárgy szerkeztése
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

    <form action="{{ route('update-subject-post') }}" method="post" class="card py-2 px-4">
        @csrf

        <input type="hidden" name="id" id="id" value="{{old('id', $data->id)}}">
        
        <div class="form-group">
            <label for="name">Név</label>
            <input name="name" type="text" class="form-control" value="{{old('name', $data->name)}}">
        </div>
        <div class="form-group">
            <label for="subject_code">Tárgy kódja</label>
            <input id="subject_code" name="subject_code" type="text" class="form-control" placeholder="IK-SSSNNN formájú, S az angol ábécé valamelyik nagybetűje, N egy szám" required value="{{old('subject_code', $data->subject_code)}}">
        </div>
        <div class="form-group">
            <label for="credit">Kreditérték</label>
            <input id="credit" name="credit" type="number" class="form-control" min="1" placeholder="0" value="{{old('credit', $data->credit)}}">
        </div>
        <div class="form-group">
            <label for="about">Leírás</label>
            <textarea id="about" name="about" rows="4" type="number" class="form-control" placeholder="{{old('about', $data->about)}}"></textarea>
        </div>


        <div class="text-center my-4">
            <button type="submit" class="btn btn-lg btn-primary">Mentés</button>
        </div>

    </form>

@endif
@endsection
