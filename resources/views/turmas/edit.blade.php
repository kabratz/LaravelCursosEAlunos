@extends('layouts.app')

@section('content')

<h1 class="text-xl font-semibold text-gray-800">Editar Turma</h1>

<x-turmas-formulario :action="route('turmas.update', $turma->id)" :method="'PUT'" :turma="$turma" />

@endsection
