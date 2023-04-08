<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

  
        $username = $request->input('username');
        $password = $request->input('password');
  
        $user = User::where('username', $username)->first();
        if (!$user) {
            return redirect('/');
        }
  
        $isValidPassword = Hash::check($password, $user->password);
        if (!$isValidPassword) {
          return redirect('/');
        }
  
        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            "token" => $generateToken,
        ]);


        // dd($request->header());
        
        return redirect('/dashboard');
    }
}
