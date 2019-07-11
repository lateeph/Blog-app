@extends('layouts.master')
@section('main')
        <div class="container">
            <div class="pull-xs-right">
                    <a class="btn btn-primary" href="{{route('blog.add')}}" role="button">
                        New Post +
                    </a>
            </div>
            <!-- Main component for call to action -->
            <div class="container text-center">
                
                <br>
                
                <!-- ================ Posts==================== -->
                <!-- notebook1 -->
                @foreach($blogs as $blog)
                <center>
                    <a href="{{route('posts.details', $blog->id)}}">
                        <h3>{{  $blog->title  }}</h3>
                            {{ $blog->category }}
                    <br><br>
                    <a class="btn btn-sm btn-info pull-xs-left" href="{{route('posts.edit', $blog->id)}}">
                            Edit
                    </a>
                </center>
                
                @endforeach

            </div>
        </div>

@endsection
