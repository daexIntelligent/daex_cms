<?php
namespace App\Services;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerify;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($inputs)
    {
        return $this->userRepository->login($inputs);
    }

    public function getUserList()
    {
        return $this->userRepository->getUserList();
    }

    public function createUsers($users)
    {
        return $this->userRepository->createUsers($users);
    }
}
