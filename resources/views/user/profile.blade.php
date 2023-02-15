<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Mahlaba</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown text-white" style="margin-bottom:20px;">
                <li class="nav-item dropdown d-flex justify-content-around">
                    <a class="nav-link " href="{{ route('profile') }}">
                        {{ Auth::user()->name }}
                    </a>
                    <a class="nav-link " href="{{ route('logOut') }}">
                        {{ __('LogOut') }}
                    </a>
                </li>
                </li>
            </ul>
        </form>
    </nav>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        @if($user->image)
                                        <img src="Profileimage/{{$user->image}}" class="rounded-circle shadow-4-strong" width="80" height="80" alt="User-Profile-Image">
                                        @else
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                        @endif
                                    </div>
                                    <h6 class="f-w-600">{{$user->name}}</h6>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Role</p>
                                            <h6 class="text-muted f-w-400">
                                                @if($user->role==true)
                                                user normale
                                                @else
                                                user Admin
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Actions</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Update</p>
                                            <button type="button" class="btn btn-success btn-bg btn-md m-1 rounded" onclick="editProfile(`{{$user->name}}`,`{{$user->email}}`)" data-bs-toggle="modal" data-bs-target="#ModalProfile">
                                                Edit
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Change password</p>
                                            <button type="button" class="btn btn-success btn-bg btn-md m-1 rounded" data-bs-toggle="modal" data-bs-target="#ModalPassword">
                                                Edit Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.profileModal')
    @include('user.Password')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="admin/js/dynamique.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("myInput1");
            var z = document.getElementById("myInput2");

            if (x.type === "password" || y.type === "password" || z.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";

            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";

            }
        }
    </script>
</body>

</html>