@extends('layouts.master')
@section('title','Inicio')
@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1 img class="d-inline text-success">Incidencia de: {{ $issue->userRelation->name }}</h1>
        </x-slot>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="card-body">
              <h5 class="card-title">{{ $issue->title }}</h5>
              <p class="card-text">{{ $issue->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item col-12">Clase: {{ $issue->classroomRelation->class }}</li>
              <li class="list-group-item col-12">Estado: {{ $issue->conditionRelation->condition }}</li>
              <li class="list-group-item col-6 d-inline">Creada: {{ $issue->created_at }}</li>
              <li class="list-group-item col-6 d-inline">Creada: {{ $issue->updated_at }}</li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
    </x-auth-card>
</x-guest-layout>
@endsection