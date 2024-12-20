@extends('tasks.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Add New Task</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('tasks.index') }}">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputTitle" class="form-label">
                        <span style="font-weight: bold">Title:</span>
                    </label>
                    <input required type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="inputTitle" placeholder="Title">
                    @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDescription" class="form-label">
                        <span style="font-weight: bold">Description:</span>
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:120px"
                              name="description" id="inputDescription" placeholder="Description"></textarea>
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputStatus" class="form-label">
                        <span style="font-weight: bold">Status:</span>
                    </label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="inputStatus">
                        <option value="1">To Do</option>
                        <option value="2">In Progress</option>
                        <option value="3">Done</option>
                    </select>
                    @error('status')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputPriority" class="form-label">
                        <span style="font-weight: bold">Priority:</span>
                    </label>
                    <select class="form-control @error('priority') is-invalid @enderror" name="priority"
                            id="inputPriority">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    @error('priority')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDue" class="form-label">
                        <span style="font-weight: bold">Due:</span>
                    </label>
                    <input required type="date" class="form-control @error('due') is-invalid @enderror" name="due"
                           id="inputDue">
                    @error('due')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Submit
                </button>
            </form>

        </div>
    </div>
@endsection
