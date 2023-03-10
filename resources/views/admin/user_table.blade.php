<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        User DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>Change Role</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>User Name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>Change Role</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                @if(Auth::user()!=$user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    @if($user->role==1)    
                    user normale 
                    @elseif($user->role==2)
                    sub Admin
                    @else
                    user Admin
                    @endif
                    </td>
                    <td>
                    @if(Auth::user()->role==0)    
                    <a href="{{ route('role',$user->id) }}"class="btn btn-sm btn-outline-warning" onclick="return confirm('are you sure ,you want to change the role of this user')">change role</a>
                    @else
                    You don't have any action in this table
                    @endif 
                </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>