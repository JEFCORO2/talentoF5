<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEliminar">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Realmente deseas eliminar al usuario?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body mt-2 text-center">
          <strong style="text-align: center !important"> 
              {{ $user->name }}
          </strong>
        </div>
        
        <div class="modal-footer">
            <form action="{{route('admin.destroy', ['user' => $user->name, 'id' => $user->id])}}" method="POST">
                @method('DELETE')
                @csrf
                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a  class="btn btn-danger" href="{{ route('user.eliminar', $user->id) }}">Borrar</a> --}}
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit"  class="btn btn-danger" value="Borrar">
            </form>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->
