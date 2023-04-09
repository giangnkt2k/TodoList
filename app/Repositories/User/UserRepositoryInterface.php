<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function login(Request $request);
    public function logout();
    public function userDetail();
}
