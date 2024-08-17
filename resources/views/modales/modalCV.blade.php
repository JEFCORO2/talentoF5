<div class="modal fade" id="verCV{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalCV" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">CV {{$user->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mt-1">
                    <embed src="{{asset('storage').'/'.$user->cv}}" type="application/pdf" width="420px" height="630px">
                </div>
            </div>
        </div>
    </div>
</div>