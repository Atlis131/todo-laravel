@extends('tasks.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Edit Task</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('tasks.index') }}">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>

            <form action="{{ route('tasks.update',$task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Title:</strong></label>
                    <input type="text" name="title" class="form-control @error('name') is-invalid @enderror"
                           id="inputName" value="{{ $task->title }}" placeholder="Title">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
                    <textarea class="form-control @error('detail') is-invalid @enderror" style="height:150px"
                              name="description" id="inputDetail"
                              placeholder="Description">{{ $task->description }}</textarea>
                    @error('detail')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Status:</strong></label>
                    <select class="form-control @error('detail') is-invalid @enderror" name="status" id="inputDetail">
                        <option
                            @if ($task->status === 1)
                                selected
                            @endif
                            value="1">To Do
                        </option>
                        <option
                            @if ($task->status === 2)
                                selected
                            @endif
                            value="2">In Progress
                        </option>
                        <option
                            @if ($task->status === 3)
                                selected
                            @endif
                            value="3">Done
                        </option>
                    </select>
                    @error('detail')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Priority:</strong></label>
                    <select class="form-control @error('detail') is-invalid @enderror" name="priority" id="inputDetail">
                        <option
                            @if ($task->priority === 1)
                                selected
                            @endif
                            value="1">Low
                        </option>
                        <option
                            @if ($task->priority === 2)
                                selected
                            @endif
                            value="2">Medium
                        </option>
                        <option
                            @if ($task->priority === 3)
                                selected
                            @endif
                            value="3">High
                        </option>
                    </select>
                    @error('detail')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Due:</strong></label>
                    <input type="date" class="form-control @error('detail') is-invalid @enderror" name="due"
                           id="inputDetail" value="{{ $task->due }}">
                    @error('detail')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Update
                </button>
            </form>

        </div>
    </div>
@endsection
