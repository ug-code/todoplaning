<?php

namespace App\Http\Controllers;


use App\Services\TodoService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;


class TodoController extends Controller
{

    private TodoService $todoService;

    public function __construct(TodoService $todoService)
    {

        $this->todoService = $todoService;
    }

    public function todo($prodiverId): View|Factory|Application
    {
        $task = $this->todoService->taskList($prodiverId);

        return view('todo', [
            'tasks'                  => $task["schedule"],
            "totalEstimatedDuration" => $task["totalEstimatedDuration"]]);

    }

    public function  todoEqual($prodiverId): View|Factory|Application
    {
        $task = $this->todoService->taskListEqual($prodiverId);

        return view('todo-alternative', [
            'tasks'                  => $task["schedule"],
            "totalEstimatedDuration" => $task["totalEstimatedDuration"]]);
    }

    public function taskList($prodiverId): JsonResponse
    {
        $task = $this->todoService->taskList($prodiverId);

        return response()->json(['data' => $task]);
    }


    public function  taskListEqual($prodiverId): JsonResponse
    {
        $task = $this->todoService->taskListEqual($prodiverId);

        return response()->json(['data' => $task]);

    }






}
