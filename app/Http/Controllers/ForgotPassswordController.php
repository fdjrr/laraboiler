<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPassswordController extends Controller
{
  public function index()
  {
    return view('pages.auth.forgot_password.index', [
      'title' => 'Forgot Password',
    ]);
  }
}
