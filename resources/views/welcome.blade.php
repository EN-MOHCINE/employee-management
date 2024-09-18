<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asstes/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('asstes/icon-user.jpg') }}" type="image/icon type">

</head>

    <body class="antialiased">
        
        
        <!-- Navigation Bar -->
        {{-- <nav class="d-flex flex-row-reverse  navbar navbar-expand-lg navbar-light bg-light">
            <!-- <a class="navbar-brand" href="#">Gestion Empolyees</a> -->
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('users.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"> Department</a>
                    </li>
                </ul>
            </div>
        </nav>--}}
            
            <div>
                @yield('content')
            </div> 






            <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
            <link rel="stylesheet" href="{{ asset('asstes/css/styles.css') }}">
        </body>
</html>
