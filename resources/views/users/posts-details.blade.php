<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NoteBook App</title>
    <link rel="stylesheet" href="dist/css/main.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <nav class="navbar  navbar-dark bg-primary">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
                &#9776;
            </button>
            <div class="collapse navbar-toggleable-xs" id="navbar-header">
                <a class="navbar-brand" href="#">NoteBook App</a>
               
        </nav>
        <!-- /navbar -->
        <!-- Main component for call to action -->
        <div class="jumbotron">
            <h1>{{  $blog->title  }}</h1>
            <p> 
                {{  $blog->body  }}
            </p>
        </div>
    </div>
    <!-- /container -->

    
    

    
    <form action="{{route('comments.save', $blog->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" placeholder="Insert Name" name="name">
        </div>
        <p>Add a Comment</p>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" rows="3" cols="100" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    @foreach($comments as $comment)
        <div class="jumbotron">
            <h3>{{  $comment->name  }}</h3>
            <p> 
                {{  $comment->comment  }}
            </p>
        </div>
    @endforeach
    


    <script src="dist/js/jquery3.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
</body>

</html>
