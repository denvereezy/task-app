@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="panel-body">
            <h1>Update</h1>
            <img src="{{$user->image}}" alt="avatar" style="border-radius:100%; height:200px; width:200px;" />
            <form class="col-md-8" action="/profile/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                {{method_field('PATCH')}} {!! csrf_field() !!}
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="name" value="{{$user->name}}"></input>
                </div>
                <div class="form-group">
                    <label for="pic">Change picture</label>
                    <input class="form-control" id="pic" type="file" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Profile</button>
                    <a class="btn btn-primary pull-right" href="/profile">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
