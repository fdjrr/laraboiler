<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  public function index()
  {
    return view('pages.auth.login.index', [
      'title' => 'Sign In',
    ]);
  }

  public function verify(Request $request): JsonResponse
  {
    try {
      $validator = Validator::make($request->all(), [
        'email'    => 'required|email',
        'password' => 'required',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status'  => false,
          'message' => $validator->errors()->first(),
        ])->setStatusCode(422);
      }

      $user = User::where('email', $request->email)->first();
      if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
          'status'  => false,
          'message' => 'Invalid email or password',
        ])->setStatusCode(400);
      }

      Auth::login($user);

      return response()->json([
        'status'       => true,
        'message'      => 'Login success',
        'data'         => Auth::user(),
        'token_type'   => 'Bearer',
        'access_token' => $user->createToken('auth_token')->plainTextToken,
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status'  => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }
}
