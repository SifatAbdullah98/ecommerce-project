<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return view('admin.login');
        }
    }
    public function auth(Request $request)
    {

       $username=$request->post('username');
       $password=$request->post('password');
       $result=Admin::where(['username'=>$username, 'password'=>$password])->get();


      if(isset($result['0']->id))
      {
         $request->session()->put('ADMIN_LOGIN',true);
         $request->session()->put('ADMIN_ID',$result['0']->id);
         return redirect('admin/dashboard');
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('admin');
      }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
