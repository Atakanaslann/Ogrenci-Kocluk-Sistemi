<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Str;
use Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
                return redirect()->route('account.dashboard');

            }else{
                return redirect()->route('account.login')->with('error','E-posta veya Şifre hatalı');
            }

        }else{
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }

    public function register(){

        return view('auth.register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name'=> 'required'
        ]);

        if($validator->passes()){

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'student';
            $user->remember_token = Str::random(50);
            $user->save();

            return redirect()->route('account.login')->with('success','Kayıt Başarılı...');

        }else{
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('account.login');
    }
}
