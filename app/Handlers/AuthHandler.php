<?php

namespace App\Handlers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthHandler
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function attemptLogin(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function registerUserAndLogin(array $data)
    {
        $user = $this->userRepository->createUser($data);
        Auth::login($user);
        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }
}
