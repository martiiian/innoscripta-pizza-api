<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials
     *
     * @param UserCreateRequest $request
     * @return JsonResponse
     */
    public function registration(UserCreateRequest $request)
    {
        $credentials = request()->all(['phone', 'password']);

        if ($token = auth()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        if (User::where('phone', $credentials['phone'])->count() > 0) {
            return response()->json([
                'errors' => [
                    'wrong' => 'Already exist'
                ]
            ], 401);
        }

        $user = User::store($request->all());
        auth()->login($user);

        $token = auth()->attempt($credentials);
        return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['phone', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'wrong' => 'Wrong combination'
                ]
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return Auth::user();
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    /**
     * Get the token array structure.
     *
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
