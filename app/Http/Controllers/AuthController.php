<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class AuthController extends Controller
{
  public function logout(Request $request): JsonResponse
  {
    try {
      if (method_exists(Auth::user()->currentAccessToken(), 'delete')) {
        Auth::user()->currentAccessToken()->delete();
      } else {
        Auth::guard('web')->logout();

        $tokenId = Str::before($request->bearertoken(), '|');
        Auth::user()->tokens()->where('id', $tokenId)->delete();
      }

      return response()->json([
        'status' => true,
        'message' => 'Logout successfully!'
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage()
      ])->setStatusCode(500);
    }
  }
}
