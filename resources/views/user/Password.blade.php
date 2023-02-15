<div class="modal fade" id="ModalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update password</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('password')}}" method="POST" class="m-4">
                    @csrf
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="mt-3">Old Password</label>
                        <input type="password" class="form-control" name="old_password" id="myInput">
                        @if ($errors->any('old_password'))
                        <span class="text-danger">{{$errors->first('old_password')}} </span>
                        @endif
                        <input type="checkbox" onclick="myFunction()" class="mt-1 me-1">Show Password
                    </div>
                    <div class="form-group">
                        <label class="mt-3">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="myInput1">
                        @if ($errors->any('new_password'))
                        <span class="text-danger">{{$errors->first('new_password')}} </span>
                        @endif
                        <input type="checkbox" onclick="myFunction()" class="mt-1 me-1">Show Password


                    </div>
                    <div class="form-group">
                        <label class="mt-3">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="myInput2">
                        @if ($errors->any('confirm_password'))
                        <span class="text-danger">{{$errors->first('confirm_password')}} </span>
                        @endif
                        <input type="checkbox" onclick="myFunction()" class="mt-1 me-1">Show Password

                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>