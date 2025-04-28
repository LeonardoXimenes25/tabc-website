<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // Menampilkan form login
     public function index()
     {
         return view('auth.login');
     }

     public function login_user (request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
         ];

         if(Auth::attempt($infologin)) {
            return redirect('/admin');
         }else{
            return redirect('')->withErrors('Username dan Password yang dimasukan tidak sesuai')->withInput();
         }
     }
}
