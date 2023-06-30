<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Task;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class TaskResource extends JsonResource
{

    public $resource; // Type declaration can't be used

    /** @param  \App\Models\Task  $resource */
    public function __construct(Task $resource)
    {
        $this->resource = $resource;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $task = $this->resource;
        return [
            'id' => $task->id,
            'userId' => $task->user_id,
            'user' => new UserResource(
                User::findOrFail($task->user_id)
            ),
            // 'user' => $this->when(
            //     $task->user_id === Auth::id(),
            //     UserResource::collection(User::all()),
            // ),
            'title' => $task->title,
            'description'=> $task->description,
            'completed' => $task->completed,
            'createdAt' => $task->created_at,
            'updatedAt' => $task->updated_at,
        ];
    }

}
