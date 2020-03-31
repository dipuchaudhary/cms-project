@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
           @if($categories->count()>0)
                <table class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <button onclick="handleDelete({{$category->id}})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal" tabindex="-1" role="dialog" id="deletemodal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="post" id="deleteform">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Are you sure you want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               @else
            <h5 class="text-center">No categories yet.</h5>
               @endif
        </div>
    </div>
    @endsection


@section('scripts')
    <script>
        function handleDelete(id) {
            $('#deletemodal').modal('show');
            console.log('deleting...');
            var form = document.getElementById('deleteform');
            form = form.action ='/categories/'+id;
        }
    </script>
    @endsection
