@extends('layouts.master')
@section('main')

<div class="navbar">
    <a class="navbar-brand" href="#">Categories=></a>
    <ul class="nav navbar-nav">
        @if(!empty($categories))
        @forelse($categories as $category)
            <li>
                <a href="#">{{$category->name}}</a>
            </li>
            @empty
            <li>No data</li>
            @endforelse
        @endif
    </ul>



    



    <!-- Trigger the modal with a button -->
    <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" href="modal-id">Add Category</a>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="{{route('category.store')}}" method="post">
                {{ csrf_field() }}
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Category Here">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</div>

@endsection