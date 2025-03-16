@extends('layouts.app')

@section('content')

<x-turmas-formulario :action="route('turmas.store')" />

@endsection
