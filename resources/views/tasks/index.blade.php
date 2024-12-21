@extends('tasks.layout')

@section('content')

    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <div class="row">
                <div class="offset-11 col-md-1 ">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </header>

        <div class="rounded-3">
            <div class="container-fluid">

                @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
                @endsession

                <h1>Hi, {{ auth()->user()->name }}</h1>
            </div>
        </div>

    </div>

    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('tasks.index') }}" method="POST">
                @csrf
                @method('GET')

                <div class="mb-3">
                    <label for="inputStatus" class="form-label">
                        <span style="font-weight: bold">Status:</span>
                    </label>
                    <select class="form-control" name="status" id="inputStatus">
                        <option
                            @if ($request['status'] == 0)
                                selected
                            @endif
                            value="0">All</option>
                        <option
                            @if ($request['status'] == 1)
                                selected
                            @endif
                            value="1">To Do</option>
                        <option
                            @if ($request['status'] == 2)
                                selected
                            @endif
                            value="2">In Progress</option>
                        <option
                            @if ($request['status'] == 3)
                                selected
                            @endif
                            value="3">Done</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="inputPriority" class="form-label">
                        <span style="font-weight: bold">Priority:</span>
                    </label>
                    <select class="form-control" name="priority" id="inputPriority">
                        <option
                            @if ($request['priority'] == 0)
                                selected
                            @endif
                            value="0">All</option>
                        <option
                            @if ($request['priority'] == 1)
                                selected
                            @endif
                            value="1">Low</option>
                        <option
                            @if ($request['priority'] == 2)
                                selected
                            @endif
                            value="2">Medium</option>
                        <option
                            @if ($request['priority'] == 3)
                                selected
                            @endif
                            value="3">High</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="inputDue" class="form-label">
                        <span style="font-weight: bold">Due:</span>
                    </label>
                    <input type="date" class="form-control" name="due"
                           id="inputDue" value="{{ $request['due'] }}">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Filter
                </button>
                <a class="btn btn-danger" href="{{ route('tasks.index') }}">
                    <i class="fa-solid fa-clear"></i>
                    Clear Filters
                </a>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h2 class="card-header">ToDo List</h2>
        <div class="card-body">

            @session('session')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('tasks.create') }}">
                    <i class="fa fa-plus"></i>
                    Create New Task
                </a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th style='width: 40px'>Id</th>
                    <th>Title</th>
                    <th style='width: 500px'>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due</th>
                    <th style='width: 250px'>Action</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @switch($task->priority)
                                @case(1)
                                    <span>Low</span>
                                    @break
                                @case(2)
                                    <span>Medium</span>
                                    @break
                                @case(3)
                                    <span>High</span>
                                    @break
                            @endswitch
                        </td>
                        <td>
                            @switch($task->status)
                                @case(1)
                                    <span>To Do</span>
                                    @break
                                @case(2)
                                    <span>In Progress</span>
                                    @break
                                @case(3)
                                    <span>Done</span>
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $task->due }}</td>
                        <td>
                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                                <a class="btn btn-info btn-sm" href="{{ route('tasks.show',$task->id) }}">
                                    <i class="fa-solid fa-list"></i>
                                    Show
                                </a>

                                <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit',$task->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
            {!! $tasks->links() !!}
        </div>
    </div>
@endsection
