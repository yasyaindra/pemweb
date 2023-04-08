<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);
  
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
  
        $user = User::create([
            'username' => $username,
            'password' => $password
        ]);
  
        return ResponseFormatter::success($user, 'Data berhasil didaftarkan');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
  
        $username = $request->input('username');
        $password = $request->input('password');
  
        $user = User::where('username', $username)->first();
        if (!$user) {
            return ResponseFormatter::success($user, 'Gagal login, username tidak terdaftar');
        }
  
        $isValidPassword = Hash::check($password, $user->password);
        if (!$isValidPassword) {
          return ResponseFormatter::success($user, 'Gagal login, password salah');
        }
  
        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            'token' => $generateToken
        ]);
  
        return ResponseFormatter::success($user, 'Data berhasil didaftarkan');
    }
}
