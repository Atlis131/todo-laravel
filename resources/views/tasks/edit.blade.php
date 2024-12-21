@extends('tasks.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Edit Task</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex">
                <a class="btn btn-primary btn-sm" href="{{ route('tasks.index') }}">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>

            <form action="{{ route('tasks.update',$task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputTitle" class="form-label">
                        <span style="font-weight: bold">Title:</span>
                    </label>
                    <input type="text" required maxlength="255" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="inputTitle" value="{{ $task->title }}" placeholder="Title">
                    @error('title')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDescription" class="form-label">
                        <span style="font-weight: bold">Description:</span>
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:120px"
                              name="description" id="inputDescription"
                              placeholder="Description">{{ $task->description }}</textarea>
                    @error('detail')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputStatus" class="form-label">
                        <span style="font-weight: bold">Status:</span>
                    </label>
                    <select class="form-control @error('detail') is-invalid @enderror" name="status" id="inputStatus">
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
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputPriority" class="form-label">
                        <span style="font-weight: bold">Priority:</span>
                    </label>
                    <select class="form-control @error('priority') is-invalid @enderror" name="priority" id="inputPriority">
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
                    @error('priority')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDue" class="form-label">
                        <span style="font-weight: bold">Due:</span>
                    </label>
                    <input required type="date" class="form-control @error('due') is-invalid @enderror" name="due"
                           id="inputDue" value="{{ $task->due }}">
                    @error('due')
                        <div class="text-danger form-text">{{ $message }}</div>
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
