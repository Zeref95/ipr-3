<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $data = makeValidation($request->all(), [
                'email' => 'required|email|exists:users,email|max:255',
                'password' => 'required|string|max:255',
            ]);

            if (Auth::attempt($data)) {
                $token = Auth::user()->createToken('auth');
                return response()->json(['token' => $token->plainTextToken]);
            }
            throw new \Exception('Wrong email or password');
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
