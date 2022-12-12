<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    </head>
    <style>
        .fade-message{
            position: absolute;
            left: 640px;
            top: 51px;
            z-index: 1;
            width: 20%;
            text-align: center;
            height: 5%;
            padding: 4px 0px 4px 0px;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-sm" style="height:50px; background-color:#e3f2fd;">
            <div class="container-fluid">
                <div class="col-9">
                    <a class="btn btn-link text-dark fs-4 shadow-none" role="button" href="{{ route('dashboard.index') }}">Global Heavy Equipment & Construction Corp</a>
                    {{-- <div class="pos-demo"></div> --}}
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="#">{{ ucwords(Auth::user()->name) }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> Setting</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Users</a></li>
                                <li><a class="dropdown-item" href="{{ route('branch.index') }}">Location</a></li>
                                <li><a class="dropdown-item" href="{{ route('rack.index') }}">Areas</a></li>
                                <li><a class="dropdown-item" href="{{ route('brand.index') }}">Manufacturers</a></li>
                                <li><a class="dropdown-item" href="#">Preference</a></li>
                                <li><a class="dropdown-item" href="#">Deleted Items</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('signout') }}">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if(session()->get('success'))
            <div class="alert alert-success fade-message">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div style="position: relative;" class="container">
            @yield('content')
        </div>
        <script>
            $(function(){
                setTimeout(function() {
                    $('.fade-message').slideUp();
                }, 5000);
                // $(".pos-demo").notify(
                //     "I'm to the right of this box",
                //     { position:"right" }
                // );
            });
        </script>
    </body>
</html>
