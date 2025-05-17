@extends('layouts.app')

@section('content')
    <h1>Lista de Usuarios</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>
@endsection