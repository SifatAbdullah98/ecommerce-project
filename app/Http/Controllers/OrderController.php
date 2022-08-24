<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Order::all();
        return view('admin.order',$result);
    }
    public function order_status(Request $request,$order_status,$id){
        $model=Order::find($id);
        $model->order_status=$order_status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/order');        
    }
    public function delivery_status(Request $request,$delivery_status,$id){
        $model=Order::find($id);
        $model->delivery_status=$delivery_status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/order');        
    }
    public function delete(Request $request,$id){
        $model=Order::find($id);
        $model->delete();
        $request->session()->flash('message','Order removed successfully');
        return redirect('admin/order');        
    }
}
