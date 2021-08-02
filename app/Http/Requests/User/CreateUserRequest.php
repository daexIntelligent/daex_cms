<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
        ];
    }

    public function filter()
    {
        return $this->only(['name', 'email', 'role']);
    }
}