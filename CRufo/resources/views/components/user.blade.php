@extends('layouts.master')
@section('title','Inicio')
@section('content')

<div class="row m-2">
    <div class="card col-3">
        <div class="card-header text-center">
        {{ $user->name }}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Correo:</b> {{ $user->email }}</li>
            <li class="list-group-item"><b>Fecha:</b> {{ $user->date_birth }}</li>
            <li class="list-group-item"><b>Teléfono:</b> {{ $user->telephone }}</li>
        </ul>
    </div>
    <div class="col-9">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscador" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col-3">Descripcion</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Creada</th>
                    <th scope="col">Actualizada</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col-1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                <tr>
                    <td>{{ $issue->title }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->classroomRelation->class }}</td>
                    <td>{{ $issue->created_at }}</td>
                    <td>{{ $issue->updated_at }}</td>
                    <td>{{ $issue->conditionRelation->condition }}</td>
                    <td class="row">
                        <div class="col-10">
                            @foreach ($issue->comments as $comment)
                                <span>{{$comment->comment}}</p>
                            @endforeach
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Añadir Comentario</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('incidencias.storeComment') }}">
                                @csrf
                                <div>
                                    <x-input id="issue" class="block mt-1 w-full invisible" type="text" name="issue" value="{{ $issue->id }}" readonly required autofocus/>
                                
                                    <x-label for="comment" :value="__('Comentario')" />
                    
                                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" required autofocus />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Crear Incidencia') }}
                            </x-button>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection