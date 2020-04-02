@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    @include('partials.errors')
                    <div class="card-body">
                        <form action="{{ route('users.update-profile',auth()->user()) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="from-group">
                                <label for="about">About Me</label>
                                <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success mt-2">Update Profile</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
