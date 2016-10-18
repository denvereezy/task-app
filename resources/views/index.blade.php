<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app') @section('content')

<!-- Bootstrap Boilerplate... -->
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('errors.errors')

            <!-- New Task Form -->
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                    </div>
                </div>
            </form>
        </div>

        @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <tr>
                            @foreach ($tasks as $task)
                            <!-- Task Name -->

                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>


                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ url('task/'.$task->id.'/edit') }}" class="btn btn-info btn-md">Edit </a>
                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                      <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                    <a href="{{ url($task->id.'/to' ) }}" class="btn btn-success btn-md">Email </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif @endsection
