<div class="modal fade" id="ModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update profile</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype='multipart/form-data' action="{{url('editprofile')}}" id="Form">
                    @csrf
                    <input type="text" name="name" id="name" class="form-control">
                    <input type="text" name="email" id="email" class="form-control">
                    <input type="file" name="image" id="image" class="form-control">
                    @if($user->image)
                    <img src="Profileimage/{{$user->image}}" height="260" width="300">
                    @endif
                    <div style="padding: 15px;">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>