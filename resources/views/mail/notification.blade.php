@extends('tasks.layout')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                    <div class="form-group">
                        <strong>Hey {{ $user->name }}, your task is due tomorrow</strong> <br/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong> <br/>
                        {{ $task->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Description:</strong> <br/>
                        {{ $task->description }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Status:</strong> <br/>
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
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Priority:</strong> <br/>
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
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Due:</strong> <br/>
                        {{ $task->due }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
