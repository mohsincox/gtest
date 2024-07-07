<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $data = $request->only(['email', 'password']);

    if (Auth::attempt($data)) {
      return redirect()->intended('/');
    }

    // return redirect()->to('/login');
    return redirect()
      ->back()
      ->with('error', 'Username and password not match!')
      ->withInput();
  }

  public function logout()
  {
    Auth::logout();

    return redirect()->to('/login');
  }
}
