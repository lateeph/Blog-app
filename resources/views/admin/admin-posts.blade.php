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
                        
                    <br>
                        <div class="tags">
                        @foreach( $blog->tags as $tag )
                                <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach    
                        </div>
                    </a>
                        <p>Posted In: {{ $blog->cat['name'] }}</p>
                    <a class="btn btn-sm btn-info pull-xs-left" href="{{route('posts.edit', $blog->id)}}">
                            Edit
                    </a>
                    <form action="{{route('posts.delete', $blog->id)}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                        </input>
                    </form>
                </center>
                
                @endforeach

            </div>
        </div>

@endsection
