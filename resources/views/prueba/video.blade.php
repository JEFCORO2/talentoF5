@extends('layouts.app')

@section('contenido')
    @vite('resources/css/dropzone.css')
    @vite('resources/js/dropzone.js')
    @vite('resources/css/alertas.css')

    @error('video')
        <div class="notificationError">
            <div class="notification__body">
                
                {{$message}} &#128640; 
            </div>
            <div class="notification__progressError"></div>
        </div>
    @enderror

    <div class="d-flex flex-row justify-content-center align-items-center">
        <form action="{{route('prueba.subir', $user)}}" class="dropzone-box" enctype="multipart/form-data"  method="POST">
            @csrf
            <h2>Cargar y adjuntar archivos</h2>
            <p>
                Adjunta tu video de presentacion
            </p>
            <div class="dropzone-area">
                <div class="file-upload-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    </svg>
                </div>
                <p>Haga clic para cargar o arrastre y suelte</p>
                <input type="file" id="" name="video" accept="video/*">
                <p class="message">No haz seleccionado ningun video</p>
            </div>
            <div class="dropzone-actions">
                <button type="reset">
                    Cancelar
                </button>
                <button id="" type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection

