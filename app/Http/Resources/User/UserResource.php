<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'email' => $this->email,
            'name' => $this->name,
            'token' => $this->token
        ];
    }
}