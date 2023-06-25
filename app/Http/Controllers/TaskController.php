<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->middleware(function($request,$next) {
            $task_id = $request->route()->parameter('task_id');
            // idが指定されていた場合
            if(!is_null($task_id)) {
                $task = Task::findOrFail($task_id);
                // ログインIDとアクセスされたショップのオーナIDが異なれば404エラー
                if(Auth::id() !== (int)$task->user_id) {
                    return response()->json(404);
                }
            }
            return $next($request);

        });

    }
    public function index()
    {
        $user_id = Auth::id();
        $tasks = Task::where('user_id', $user_id)->get();
        return response()->json($tasks, 200);
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $tasks = Task::where('user_id', $user_id)->get();
        return response()->json($tasks, 200);
    }
}
