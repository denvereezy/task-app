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
                        <th>Created at</th>
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
                            <td class="table-text">
                                <div>{{ $task->created_at }}</div>
                            </td>
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" id="del" method="POST">
                                    <a href="{{ url('task/'.$task->id.'/edit') }}" class="btn btn-info btn-md">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    </a>
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" id="delete-task-{{ $task->id }}">
                                            <i class="fa fa-btn fa-trash"></i> Delete
                                    </button>
                                    <a href="{{ url($task->id.'/to' ) }}" class="btn btn-success btn-md"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email </a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
            </div>
            </table>
        </div>
    </div>
</div>
@endif @endsection
