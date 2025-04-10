<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskRequest $request)
    {
        $data = $request->validated();
        $search = $data['search'] ?? '';
        $per_page = $data['per_page'] ?? null;

        if (isset($data['sort'])) {
            $tasks = TaskResource::collection(Task::query()->whereLike('title', "%$search%")->
            orderBy($data['sort'], 'desc')->paginate($per_page)->withQueryString());
        } else {
            $tasks = TaskResource::collection(Task::query()->whereLike('title', "%$search%")->
            paginate($per_page)->withQueryString());
        }
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::firstOrCreate($data);
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(["message" => "Task deleted successfully"]);
    }
}
