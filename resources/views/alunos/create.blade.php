@extends('layouts.app')

@section('content')

<x-alunos-formulario :action="route('alunos.store')" />

@endsection
