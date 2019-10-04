<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Blog App
            </title>
            <link href="{{asset('dist/css/main.css')}}" rel="stylesheet">
            <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet">
            <link href="{{asset('dist/css/select2.min.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class='container'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('home')}}">Blog App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category', 1)}}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category', 2)}}">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category', 3)}}">Technology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category', 4)}}">Entertainment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category', 5)}}">Sport</a>
                    </li>
                    </ul>
                </div>
            </nav>
        
            @yield('main')

            <script src="{{asset('dist/js/jquery3.min.js')}}">
            </script>
            <script src="{{asset('dist/js/bootstrap.js')}}">
            </script>
            <script src="{{asset('dist/js/select2.min.js')}}">
            </script>
        </div>
    </body>
</html>
