<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog App</title>
    <link href="{{asset('dist/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/select2.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar  navbar-dark bg-primary">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
                &#9776;
            </button>
            <div class="collapse navbar-toggleable-xs" id="navbar-header">
                <a class="navbar-brand" href="{{route('home')}}">Blog App</a>
            </div>   
        </nav>
        <!-- /navbar -->
        <!-- Main component for call to action -->
        <div class="jumbotron">
            <h1>Blog</h1>
            <p>Store and organise your thoughts in notebook and NoteBook web app makes this easier than ever</p>
            <p>
                <a class="btn btn-lg btn-primary" href="{{ route('posts')  }}" role="button">Your Blogs</a>
            </p>
        </div>
    </div>
    <!-- /container -->

    <script src="{{asset('dist/js/jquery3.min.js')}}">
    </script>
    <script src="{{asset('dist/js/bootstrap.js')}}">
    </script>
    <script src="{{asset('dist/js/select2.min.js')}}">
    </script>
</body>

</html>
