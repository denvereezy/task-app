@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <form action="/email/send/{{$task->id}}" method="POST">
        <div class="form-group">
            {{ method_field('PATCH') }}
             {!! csrf_field() !!}
            <label>Task</label>
            <textarea name="name" rows="8" cols="40" disabled>{{$task->name}}"</textarea>
        </div>
        <div class="form-group">
            <label>To:</label> {{ csrf_field() }}
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Subject:</label> {{ csrf_field() }}
            <input type="text" name="subject">
        </div>
        <input class="btn btn-primary" type="submit" value="Send">
    </form>
</div>
@endsection
