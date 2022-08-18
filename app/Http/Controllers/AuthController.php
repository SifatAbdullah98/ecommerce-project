<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
   public function index()
   {
    return view('front.login');
   }
   public function login(Request $request)
   {
        $email=$request->post('email');
        $password=$request->post('password');
        $result=Customers::where(['email'=>$email, 'password'=>$password])->get();


        if(isset($result['0']->id))
        {
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$result['0']->id);
            return redirect('home');
        }
        else
        {
            $request->session()->flash('error','Please enter valid information');
            return redirect('login');
        }
            return view('front.login');
   }
}
