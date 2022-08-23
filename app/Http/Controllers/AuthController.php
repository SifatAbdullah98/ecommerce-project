<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('/');
        }
        else
        {
            return view('front.login_view');
        }
    }
    public function login_view(Request $request)
    {
        return view('front.login_view');
    }
    public function login(Request $request)
    {

        $phone=$request->post('phone');
        $password=$request->post('password');
        //$result['customer']=DB::table('customers')->where(['phone'=>$phone])->where(['password'=>$password])->get();
        $result=Customer::where(['phone'=>$phone, 'password'=>$password])->get();


      if(isset($result['0']->id))
      {
         $request->session()->put('ADMIN_LOGIN',true);
         $request->session()->put('ADMIN_ID',$result['0']->id);
         return redirect('/');
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('/login_view');
      }
     }
}
