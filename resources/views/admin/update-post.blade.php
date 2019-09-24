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
        </meta>
    </head>
    <body>
        <div class="container">
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
                    Update Blog Post
                </h1>
                

                <div class="clearfix">
                </div>
                <br>
                
                <!-- ================ Update Blog form==================== -->
                <form action="{{route('admin-posts.update', $id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title Here" value="{{$blog->title}}"> 
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" name="body" rows="10" placeholder="Enter Body Here">{{$blog->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url" placeholder="Enter Url Here" value="{{$blog->url}}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value='{{ $category->id }}'
                            @if ($category->id == $blog->cat->id)
                                class ='label-default' selected="selected"
                            @endif
                            >{{$category->name}}</option>
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
                    <button type="submit" class="btn btn-primary">Update Blog Post</button>
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
                $('.select2-multi').select2().val({!! json_encode($blog->tags()->allRelatedIds()) !!}).trigger('change'); 
            </script>
        </div>
    </body>
</html>
