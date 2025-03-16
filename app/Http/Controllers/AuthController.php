<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_post(Request $request){

        $user = request()->validate([
            'name' => 'required',
            'email'=> 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role = trim($request->role);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success','başarılı');
    }

    public function login(){
        return view('auth.login');
    }

    public function login_post(Request $request){
        if(Auth::attempt(['email' => $request->email , 'password'=>$request->password],true)){
            if(Auth::User()->role == 'student'){
                $data['getRecord'] = User::find(Auth::user()->id);
                return view('students.dashboard',$data);
            }else if(Auth::User()->role == 'coach'){
                $data['getRecord'] = User::find(Auth::user()->id);
                return view('coach.dashboard',$data);
            
        }else{
            return redirect('login')->with('error','Giriş Başarısız');
        }
    }else {
        return redirect()->back()->with('error','başarısız giriş');
    }
}

    public function forgot(){
        return view('auth.forgot');
    }
}