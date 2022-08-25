<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $order['order']=DB::table('orders')->where(['customer_id'=>$id])->get();
        $result['customer_detais']=$arr['0'];         
        return view('admin/customer_details',$result,$order); 
    }
    public function customer_order_details(Request $request)
    {
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $customer_id=session()->get('CUSTOMER_ID');
        $order['order']=DB::table('orders')->where(['customer_id'=>$customer_id])->join('products','products.id','=','orders.product_id')->get();
        //$order['product']=DB::table('products')->where(['customer_id'=>$customer_id])->join('products','products.id','=','orders.product_id')->get();        
        return view('front.customer_order_details',$result,$order); 
    }
    public function status(Request $request,$status,$id){
        $model=Customer::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/customer');        
    }
    public function indexl(Request $request)
    {
        if($request->session()->has('CUSTOMER_LOGIN'))
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
        $result=Customer::where(['phone'=>$phone, 'password'=>$password])->get();

      if(isset($result['0']->id))
      {
         $request->session()->put('CUSTOMER_LOGIN',true);
         $request->session()->put('CUSTOMER_ID',$result['0']->id);
         return redirect('/');
         //echo "<h2>check done!</h2>";
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('/login_view');
         //echo "<h2>check error</h2>";
      }
     }
}
