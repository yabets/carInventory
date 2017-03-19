@extends('layouts.app')

@section('content')
<!-- Create Task Form... -->

<!-- Current Tasks -->
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
            @foreach ($tasks as $task)
            <tr>
                <!-- Task Name -->
                <td class="table-text">
                    <div>{{ $task->name }}</div>
                </td>

                <!-- Delete Button -->
                <td>
                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection