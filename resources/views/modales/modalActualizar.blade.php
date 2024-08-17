<div class="modal fade" id="actualizar{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalActualizar" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mt-1">
                    <div class="">
                        <form action="{{ route('admin.actualizar', ['user' => auth()->user()->name, 'id' => $user->id]) }}" method="POST">
                            @csrf               
                            <div class="mb-3">
                                <label for="tel" class="form-label">Telefono</label>
                                <input type="tel" id="tel" name="tel" placeholder="Telefono"
                                    value="{{$user->tel}}"
                                    class="form-control @error('tel') is-invalid @enderror" >
                                @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="rols_id">Rol de Usuario</label>
                                    <select class="form-control" id="rol" name="rols_id">
                                        <option value="1" {{ $user->rols_id == 1 ? 'selected' : '' }}>Administrador</option>
                                        <option value="2" {{ $user->rols_id == 2 ? 'selected' : '' }}>Postulante</option>
                                        <option value="3" {{ $user->rols_id == 3 ? 'selected' : '' }}>Psicólogo</option>
                                    </select>
                                </div>
                                
                                @error('rols_id')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit"  class="btn btn-success" value="Guardar Cambios">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>