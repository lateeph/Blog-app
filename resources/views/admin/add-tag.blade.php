@extends('layouts.master')
@section('main')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
            <form action="{{route('tags.store')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
                <h2>New Tag</h2>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-block btn-h1-spacing">Create New Tag</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection