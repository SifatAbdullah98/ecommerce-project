<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Customer::all();
        return view('admin.customer',$result);
    }
    public function show(Request $request,$id='')
    {
        $arr=Customer::where(['id'=>$id])->get();
        $result['customer_detais']=$arr['0'];         
        return view('admin/customer_details',$result); 
    }
    public function status(Request $request,$status,$id){
        $model=Customer::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/customer');        
    }
}
