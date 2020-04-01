@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if($tags->count()>0)
                <table class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Posts count</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>
                                {{$tag->posts->count()}}
                            </td>
                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <button onclick="handleDelete({{$tag->id}})" class="btn btn-danger btn-sm">Delete</button>
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
                                    <h5 class="modal-title">Delete tag</h5>
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
                <h5 class="text-center">No tags yet.</h5>
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
            form = form.action ='/tags/'+id;
        }
    </script>
@endsection
