@extends('layouts.master')
@section('main')

@foreach($blogs as $blog)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>{{  $blog->title  }}</h1>
        <p>{{  $blog->body  }}</p>
        <hr>
        
        <p>Posted In: {{ $blog->cat['name'] }}</p>
       
    </div>
</div>
@endforeach

@endsection