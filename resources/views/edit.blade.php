@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


    <h1>Edit Task</h1>

    <form action="/task/{{$task->id}}" method="POST">
      {{method_field('PATCH')}}
      {!! csrf_field() !!}
      <input name="_method" type="hidden" value="PATCH">
      <div class="form-group">
        <textarea name="name" rows="8" cols="40">{{$task->name}}</textarea>
      </div>
      <div class="form-group">

        <button type="submit" class="btn btn-success">Update Task</button>
        <a class="btn btn-primary" href="/tasks">Back To Tasks</a>
      </div>
    </form>
  </div>
</div>
@endsection
