@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

        <img src="{{$user->image}}" alt="avatar" style="border-radius:100%; height:200px; width:200px;"/>
        <div class="panel-body">
            <div class="form-group">
                <label for="username">Username</label>
                <br />
                <h3 id="username">{{$user->name}}</h3>
            </div>
            <a class="btn btn-primary" href="{{ url('profile/edit/'.$user->id ) }}">Update Profile</a>
        </div>
    </div>
</div>
@endsection
