<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Facades\App\Libraries\Session;
use Illuminate\Support\Arr;

class UserController
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userService->login($request->filter());
        return new UserResource(Arr::add($user, 'token', Session::set($user)));
    }

    public function logout()
    {
        // $user = $this->userService->logout($request->filter());
        return true;
    }

    public function userList()
    {
        return new UserCollection($this->userService->getUserList());
    }

    public function createUsers(Request $request)
    {
        // return new UserCollection($this->userService->createUsers($request->all()));
        $this->userService->createUsers($request->all());
    }
    
}
