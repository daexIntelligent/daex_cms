<?php
namespace App\Http\Resources\User;

// use App\Http\Resources\BaseCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->map(function ($user) {
            return [
                'user_id' => $user->user_id,
                'email' => $user->email,
                'name' => $user->name,
                'role' => $user->role_id,
                'status' => $user->status,
                'created_at' => $user->created_at
            ];
        });
    }
}