<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function emailCheck(): JsonResponse
    {
        return response()->json(['exist' => true]);
    }
}
