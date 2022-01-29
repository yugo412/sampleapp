<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function emailCheck(Request $request): JsonResponse
    {
        if (!empty($request->address)) {
            return response()->json([
                'exist' => User::whereEmail($request->address)->exists(),
            ]);
        }

        return response()->json(['exist' => false]);
    }
}
