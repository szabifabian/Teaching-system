@extends('layouts.app')

@section('title', 'Saját profil')
@section('content')

<h1>Saját profilom</h1>
<div class="container bg-primary">
    <p class="text-center text-white font-weight-bold">Adataim</p>
    <p class="text-center text-white">Név: {{ Auth::user()->name }}</p>
    <p class="text-center text-white">E-mail cím: {{ Auth::user()->email }}</p>
    <p class="text-center text-white">Jogviszonyom: {{ Auth::user()->role == "teacher" ? "tanár" : "diák/hallgató" }}</p>
</div>
    
@endsection