@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
           @if(count($posts)>0)
                <table class="table table-striped">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('storage/'.$post->image)}}" alt="" width="100px" height="100px"></td>
                            <td>{{$post->title}}</td>
                            <td>
                                    <a href="{{ route('categories.edit',$post->category->id) }}">{{$post->category->name}}</a>

                            </td>
                            <td>
                                @if($post->trashed())
                                    <form action="{{ route('restore-posts',$post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>

                                    @else
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ $post->trashed() ? 'Delete' : 'Trash'}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
               @else
               <h5 class="text-center">No posts yet.</h5>
            @endif
        </div>
    </div>
    @endsection
