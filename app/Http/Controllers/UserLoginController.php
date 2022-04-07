<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserLoginController extends Controller
{
        public function login(){
            return view('login');
        }
    
        public function submitLogin(Request $req){
            $req->validate([
                'email' => 'required|exists:users,email', //check if there is no this input email in users table
                'pass' => 'required'
            ],[
                'email.required' => 'សូមបំពេញអីមែល',
                'email.exists'=> '​Email មិនត្រឺមត្រូវ',
                'pass.required' => 'សូមបំពេញលេខសម្ងាត់'
            ]);

            $user = User::where('email',$req->email)->first();
            if($user && Hash::check($req->pass,$user->password)){
                $req->session()->put('userLogin',$user);
                return redirect()->route('home');
            }else{
                return back()->with('fail_login','Invalid Email or Password!');
            }
        }

        public function logout(Request $req){
            $req->session()->flush();
            return redirect()->route('user.login'); 
        }
}
