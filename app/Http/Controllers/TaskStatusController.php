<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::all();
        return view('taskStatuses.index', compact('taskStatuses'));
    }


    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('taskStatuses.create', compact('taskStatus'));
    }


    public function store(TaskStatusRequest $request)
    {
        $taskStatus = new TaskStatus();
        $this->saveTaskStatus($taskStatus, $request);
        flash(__('Status created successfully'))->success();
        return redirect()->route('task_statuses.index');
    }


    public function show(TaskStatus $taskStatus)
    {
        //
    }


    public function edit(TaskStatus $taskStatus)
    {
        return view('taskStatuses.edit', compact('taskStatus'));
    }


    public function update(TaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $this->saveTaskStatus($taskStatus, $request);
        flash(__('Status updated successfully'))->success();
        return redirect()->route('task_statuses.index');
    }


    public function destroy(TaskStatus $taskStatus)
    {
        try {
            $taskStatus->delete();
            flash(__('Status removed successfully'))->success();
        } catch (\Exception $e) {
            flash(__('Failed to remove status'))->error();
        }
        return redirect()->route('tasks_statuses.index');
    }

    private function saveTaskStatus(TaskStatus $taskStatus, TaskStatusRequest $request)
    {
        $validated = $request->validated();
        $taskStatus->fill($validated);
        $taskStatus->save();
    }
}