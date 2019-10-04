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
        <div class="container">
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
                    <ul class="nav navbar-nav navbar-right offset-7">
                    
                    <li class="dropdown">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.posts')  }}">Posts</a></li>
                            <li><a href="{{ route('category.create')  }}">Categories</a></li>
                            <li><a href="{{ route('tag.add')  }}">Tags</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    </ul>


                </div>
            </nav>
            <nav class="navbar navbar-dark bg-primary">
                <button aria-controls="navbar-header" class="navbar-toggler hidden-sm-up" data-target="#navbar-header" data-toggle="collapse" type="button">
                    ☰
                </button>
                <div class="collapse navbar-toggleable-xs" id="navbar-header">
                    <a class="navbar-brand" href="#">
                        Blog App
                    </a>
                </div>
            </nav>
            <!-- /navbar -->
            <!-- Main component for call to action -->
            <div class="container text-center">
                <!-- heading -->
                <h1 class="pull-xs-left">
                    Add Blog Post
                </h1>
                

                <div class="clearfix">
                </div>
                <br>
                
                <!-- ================ Add Blog form==================== -->
                <form action="/add" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title Here">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" name="body" rows="10" placeholder="Enter Body Here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url" placeholder="Enter Url Here">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control select2-multi" name="tags[]" multiple='multiple'>
                            @foreach($tags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Blog Post</button>
                </form>
            </div>
            <!-- /container -->
            <script src="{{asset('dist/js/jquery3.min.js')}}">
            </script>
            <script src="{{asset('dist/js/bootstrap.js')}}">
            </script>
            <script src="{{asset('dist/js/select2.min.js')}}">
            </script>
            <script type="text/javascript">
                $('.select2-multi').select2();
            </script>
        </div>
    </body>
</html>
