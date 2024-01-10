<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
  public function index()
  {
    return view('pages.users.profile', [
      'title' => 'My Profile',
    ]);
  }

  public function update(Request $request): JsonResponse
  {
    try {
      $validator = Validator::make($request->all(), [
        'name'             => 'required',
        'email'            => 'required|email',
        'password'         => ($request->password) ? 'required|min:8' : '',
        'confirm_password' => 'same:password',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'status'  => false,
          'message' => $validator->errors()->first(),
        ])->setStatusCode(422);
      }

      $user = Auth::user();

      if ($request->email != $user->email && User::where('email', $request->email)->exists()) {
        return response()->json([
          'status'  => false,
          'message' => 'Email already exists!',
        ])->setStatusCode(400);
      }

      $user->name     = $request->name;
      $user->email    = $request->email;
      $user->password = ($request->password) ? Hash::make($request->password) : $user->password;
      $user->save();

      return response()->json([
        'status'  => true,
        'message' => 'Profile updated successfully!',
      ])->setStatusCode(200);
    } catch (Throwable $e) {
      return response()->json([
        'status'  => false,
        'message' => $e->getMessage(),
      ])->setStatusCode(500);
    }
  }
}
