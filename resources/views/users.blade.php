@extends('layouts.app') @section('content') @if (count($users) === 0)
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 style="text-align:center;">No new users yet. Just you</h1>
            </div>
        </div>
    </div>
</div>
@endif @if (count($users) > 0)
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Users
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>User</th>
                        <th>Created at</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                            <td class="table-text">
                                <div>{{ $user->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $user->name }}</div>

                            </td>
                            <td>
                                <form action="{{ url('user/'.$user->id) }}" id="del" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" id="delete-user-{{ $user->id }}">
                                    <i class="fa fa-btn fa-trash"></i> Delete
                                    </button>
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
