@extends('layouts.master')
@section('title','Inicio')
@section('content')

<div class="p-2 bg-success bg-opacity-25 m-2">
    <h2>Listado de incidencias</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Aula</th>
                <th scope="col">Autor</th>
                <th scope="col">Creación</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        @foreach ($issues as $issue)
        <tr>
            <td>{{ $issue->title }}</td>
            <td>{{ $issue->description }}</td>
            <td>{{ $issue->classroomRelation->class }}</td>
            <td>{{ $issue->author }}</td>
            <td>{{ $issue->created_at }}</td>
            <td>{{ $issue->conditionRelation->condition }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection