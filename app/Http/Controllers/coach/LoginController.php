<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function index(){
        return view('coach.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
                return redirect()->route('account.dashboard');

            }else{
                return redirect()->route('account.login')->with('error','E-posta veya Şifre hatalı');
            }

        }else{
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }
}
