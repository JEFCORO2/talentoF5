@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat con ChatGPT</div>

                    <div class="card-body">
                        <div id="chat-container">
                            {{-- Aquí se mostrarán los mensajes del chat --}}
                        </div>

                        <form id="chat-form" action="{{route('chat.respuesta')}}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="mensaje" id="user-input" placeholder="Escribe tu mensaje...">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
