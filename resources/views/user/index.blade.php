@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Users</div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table table-striped">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}"></td>
                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{ route('users.make-admin',$user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                               @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-center">No users yet.</h5>
            @endif
        </div>
    </div>
@endsection
