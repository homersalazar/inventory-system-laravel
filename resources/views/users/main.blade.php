<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <style>
            .fade-message{
                position: absolute;
                left: 640px;
                top: 55px;
                z-index: 1;
                width: 20%;
                text-align: center;
                height: 5%;
                padding: 4px 0px 4px 0px;
            }
        </style>
        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand mr-auto" href="#">Global Heavy Equipment And Construction Corp.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                            </li>
                        {{-- @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                            </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(session()->get('success'))
        <div class="alert alert-success fade-message">
            {{ session()->get('success') }}
        </div><br />
    @endif

        @yield('contents')

    <script>
        $(function(){
            setTimeout(function() {
                $('.fade-message').slideUp();
            }, 5000);
        });
    </script>
    </body>
</html>
