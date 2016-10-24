@extends('layouts.app') @section('content')

<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

        <form class="col-md-8" action="/email/send/{{$task->id}}" method="POST">
            <div class="form-group">
                {{ method_field('PATCH') }} {!! csrf_field() !!}
                <label>Task</label>
                <p>{{$task->name}}</p>
            </div>
            <div class="form-group">
                <label>To:</label> {{ csrf_field() }}
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Subject:</label> {{ csrf_field() }}
                <input class="form-control" type="text" name="subject">
            </div>
            <input class="btn btn-success" type="submit" value="Send">
            <a class="btn btn-primary pull-right" href="/tasks">Back To Tasks</a>

        </form>
    </div>
</div>
@endsection
