@extends('layouts.app')

@section('content')

<x-alunos-formulario :action="route('alunos.update', $aluno->id)" :method="'PUT'" :aluno="$aluno" />

@endsection