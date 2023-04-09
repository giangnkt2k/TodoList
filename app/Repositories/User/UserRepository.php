<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\User\UserRepositoryInterface;
use Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function login(Request $request): Response
    {
        $input = $request->all();
        Auth::attempt($input);
        $user = Auth::user();
        $token = $user->createToken('token')->accessToken;

        return Response(['status' => 200, 'token' => $token], 200);
    }

    public function logout(): Response
    {
        if (Auth::guard('api')->check()) {
            $accessToken = Auth::guard('api')->user()->token();

            \DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);
            $accessToken->revoke();

            return Response(['data' => 'Unauthorized', 'message' => 'User logout successfully.'], 200);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    public function userDetail(): Response
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            return Response(['data' => $user], 200);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }
}
