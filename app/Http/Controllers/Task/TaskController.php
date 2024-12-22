<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function index(Request $request): View|RedirectResponse
    {
        if (!Auth::check()) {
            return redirect("login");
        }

        $userId = Auth::id();
        $post = $request->post();

        $tasks = Task::where('user_id', $userId);

        if (!empty($post)) {
            if ($post['status'] > 0) {
                $tasks = $tasks->where('status', $post['status']);
            }

            if ($post['priority'] > 0) {
                $tasks = $tasks->where('priority', $post['priority']);
            }

            if (!is_null($post['due'])) {
                $tasks = $tasks->where('due', $post['due']);
            }
        }

        $tasks = $tasks->paginate(5);

        return view('tasks.index', compact('tasks'), compact('request'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
