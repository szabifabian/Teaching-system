@extends('layouts.app')

@section('title', 'Értékelés')

@section('content')
@if ($data == null)
        <div class="alert alert-danger text-center">
            Az elem nem található
        </div>
@else
    <h1 class="text-center my-4">
            Megoldás értékelése
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
    <form action="{{ route('add-solution-grade-post') }}" method="post" class="card py-2 px-4">
        @csrf
        <input type="hidden" name="id" id="id" value="{{old('id', $data->id)}}">

        <textarea id="answer" name="answer" rows="15" type="text" class="form-control" autocomplete="answer" style="display:none;">{{old('asnwer', $data->answer)}}</textarea>

        <details><summary>Feladat szövege</summary>{{$data->task->about}}</details>

        <h6>Megoldás:</h6> {{$data->answer}}
        <div class="form-group">
            <label for="grade">Pontozás</label>
            <input id="grade" name="grade" type="number" class="form-control" min="1" max="{{$data->task->score}}" required>
        </div>
        <div class="form-group">
            <label for="comment">Megjegyzés</label>
            <textarea id="comment" name="comment" rows="15" type="text" class="form-control"></textarea>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-lg btn-primary">Értékel</button>
        </div>

    </form>
@endif
@endsection