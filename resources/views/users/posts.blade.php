@extends('layouts.master')
@section('main')

            <!-- Main component for call to action -->
            <div class="container text-center">
                
                <br>
                
                <!-- ================ Posts==================== -->
                <!-- notebook1 -->
                @foreach($blogs as $blog)
                <center>
                    <a href="{{route('posts.details', $blog->id)}}">
                        <h3>{{  $blog->title  }}</h3>
                        <img src="/storage/{{ $blog->image }}"></a>
                    {{ $blog->cat['name'] }}
                    <br><br>
                </center>
                
                @endforeach

            </div>
@endsection