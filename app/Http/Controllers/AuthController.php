<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;//se importo este controlador para hashear una clave de 123456 y poder loguear
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456)); //funcion para crear un hash

        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
             return redirect('admin/dashboard');
         }else if (Auth::user()->user_type == 2) {
             return redirect('teacher/dashboard');
         }else if (Auth::user()->user_type == 3) {
             return redirect('student/dashboard');
         }else if (Auth::user()->user_type == 4) {
             return redirect('parent/dashboard');
         } 
     }

     return view('auth.login');
 }

 public function AuthLogin(Request $request)
     {
        //dd($request->all());

        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

             if (Auth::user()->user_type == 1) {
                 return redirect('admin/dashboard');
             }else if (Auth::user()->user_type == 2) {
                 return redirect('teacher/dashboard');
             }else if (Auth::user()->user_type == 3) {
                 return redirect('student/dashboard');
             }else if (Auth::user()->user_type == 4) {
                 return redirect('parent/dashboard');
             } 


         } else {

            return redirect()->back()->with('error', 'Por favor ingrese usuario o clave validas');
        }

    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

     public function PostForgotPassword(Request $request)
    {
        $user = user::getEmailSingle($request->email);
        //dd($user);

        if (!empty($user)) {
            
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Revise su bandeja de email y resetee su clave');

        } else {
            return redirect()->back()->with('error', 'Email ingresado no esta registardo en el sistema');
        }
        
    }

    public function reset($remember_token)
    {
        //dd($remember_token);

        $user = User::getTokenSingle($remember_token);

        if (!empty($user)) {
            
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
        


    }


    public function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', 'Cambio de clave exitosa.');


        } else {
            return redirect()->back()->with('error', 'La clave y la confirmacion no coinciden');
        }
        
    }

     public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
