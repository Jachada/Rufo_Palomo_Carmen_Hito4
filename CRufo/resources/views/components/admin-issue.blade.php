@extends('layouts.master2')
@section('title','Inicio')
@section('content')

<div class="p-2 bg-success bg-opacity-25 m-2">
    <h2>Listado de incidencias</h2>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscador" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Aula</th>
                <th scope="col">Autor</th>
                <th scope="col">Comentarios</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($issues as $issue)
        <tr>
            <td>{{ $issue->title }}</td>
            <td>{{ $issue->description }}</td>
            <td>{{ $issue->classroomRelation->class }}</td>
            <td>{{ $issue->userRelation->name }}</td>
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
            <td>{{ $issue->created_at }}</td>
            <td>{{ $issue->updated_at }}</td>
            <td>{{ $issue->conditionRelation->condition }}</td>
            <td>
                <a href="incidencia/editar/{{ $issue->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                </svg></a>

                {{-- <a href="incidencia/borrar/{{ $issue->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg></a> --}}
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
    </table>
</div>


@endsection