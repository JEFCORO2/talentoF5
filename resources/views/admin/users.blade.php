@extends('layouts.app')

@section('contenido')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Usuarios Registrados</h3>
        </div> <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 200px">Nombre</th>
                        <th style="width: 200px">Gmail</th>
                        <th style="width: 100px">Telefono</th>
                        <th style="width: 100px">Estado</th>
                        <th style="width: 100px">Rol</th>
                        <th style="width: 50px">CV</th>
                        <th style="width: 100px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                        <tr class="align-middle">
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('perfil.index', $user->name)}}" class="nav-link">{{$user->name .' '.$user->apellidos}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->tel}}</td>
                            @if ($user->estado)
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Apto
                                    </button>
                                </td>  
                            @else
                                <td>
                                    <button type="button" class="btn btn-danger">
                                        No Apto
                                    </button>
                                </td>
                            @endif
                            
                            @if (auth()->user()->rols_id == 1)
                                <td>{{$user->descripcionRol($user)}}</td>
                                <td>
                                    @if ($user->cv)
                                        <div class="">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#verCV{{$user->id}}">
                                                <i class="bi bi-file-earmark-pdf-fill"></i>                                             
                                            </button>
                                        </div>
                                    @endif
                                </td>
                                <td class="d-inline-flex text-align:center gap-3">
                                    <div class="">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actualizar{{$user->id}}">
                                            Actualizar
                                        </button>
                                    </div>
        
                                    <div>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$user->id}}">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>   
                            @endif
                        </tr>
                        @include('modales.modalCV')
                        @include('modales.modalActualizar')
                        @include('modales.modalEliminar')
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
            </ul>
        </div>
    </div> <!-- /.card -->
@endsection