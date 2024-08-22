@extends('layouts.app')

@section('contenido')
    @vite('resources/css/alertas.css')

    @error('file')
        <div class="notificationError">
            <div class="notification__body">
                  
                {{$message}} &#128640; 
            </div>
            <div class="notification__progressError"></div>
        </div>
    @enderror

    @if ($user->id === auth()->user()->id)
        <h1 class=" d-flex justify-content-center fw-bold">Hola : {{auth()->user()->name}}</h1>
    @else
        <h1 class=" d-flex justify-content-center fw-bold">Perfil : {{$user->name .' '. $user->apellidos}}</h1>
    @endif
    
 
    <div class="container">
        <div class="d-flex flex-row mb-3 justify-content-center align-items-center mt-5">
    
            <div class="w-25 h-25 d-inline-block">
                {{-- <img src="{{auth()->user()->imagen ?  Storage::url(auth()->user()->imagen) : asset('img/usuario.svg')}}" alt="imagen-usuario"> --}}
                <img src="{{ $user->imagen ? asset('img/perfiles') . '/' . $user->imagen : asset('img/usuario.svg')}}" alt="usuario" class="user-image rounded-circle shadow" style="width: 250px; height: 250px;">
            </div>

            <div class="d-flex align-items-start flex-column mb-5 p-5">
                <p class="">{{$user->id === auth()->user()->id ? auth()->user()->name : $user->name}}</p>
                                
                <p class="">{{$user->id === auth()->user()->id ? auth()->user()->email : $user->email}}</p>

                <p class="">
                    0
                    <span class="font-normal">Postulaciones</span>
                </p>

                @if ($user->id === auth()->user()->id)
                    <a href="{{route('perfil.editar', auth()->user()->name)}}" class="btn btn-info">Editar perfil</a>

                    @if ($user->cv)
                        <div class="w-50 h-50 mt-2">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#verCV{{$user->id}}">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </button>

                            <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#eliminarCV{{$user->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    @else
                        <form action="{{route('perfil.subir', $user)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="file" name="file" class="form-control mt-2">
                            <button type="submit" class="btn btn-success mt-2">Subir CV</button>
                        </form>
                    @endif
                    {{-- <a href="{{route('perfil.subir', auth()->user()->name)}}" class="btn btn-success mt-2">Subir CV</a> --}}
                @else
                    <form action="{{route('mensaje.store', $user)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control  form-control-lg"  style="width:150%" id="mensaje" name="mensaje" rows="3">
                                
                            </textarea>
                        </div>
                        <div class="">
                            <input type="submit"  class="btn btn-success" value="Enviar Mensaje">
                        </div>
                    </form>
                @endif
            </div>
        </div>
        @include('modales.modalCV')
        @include('modales.modalEliminarCV')
    </div>
@endsection