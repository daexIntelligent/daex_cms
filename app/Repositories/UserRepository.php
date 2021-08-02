<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Exceptions\UserUnauthorizedException;
use Config;

class UserRepository
{
    public function login($inputs)
    {
        try {
            return User::where([
                'email' => $inputs['email'],
                'password' => hash('sha256', $inputs['password']),
            ])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // \Log::error($e);
        }
    }

    public function getUserList()
    {
        try {
            return User::all();
        } catch (ModelNotFoundException $e) {
            // \Log::error($e);
        }
    }

    public function createUsers($users)
    {
        try {
            return User::insert($users);
        } catch (\Exception $e) {
            // \Log::error($e);
        }
    }
}
