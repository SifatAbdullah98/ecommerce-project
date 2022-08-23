<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use session;

class CartController extends Controller
{

    public function index()
    {
        $result['data']=Cart::all();
        return view('/show_cart',$result);
    }
    public function add_to_cart(Request $request){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        if($request->session()->has('CUSTOMER_ID')){
            $cart=new Cart;
            $cart->customer_id=$request->session()->get('CUSTOMER_ID');
            $cart->product_id=$request->product_id;
            $cart->save();


            return redirect('/');
        }
        else{
            return redirect('/login');
        }

    }
    public function show_cart(Request $request){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $customer_id=session()->get('CUSTOMER_ID');
        $product=DB::table('cart')->join('products','products.id','=','cart.product_id')->where(['customer_id'=>$customer_id])->select('products.*','cart.id as cart_id')->get();
        $voucher=DB::table('vouchers')->where(['status'=>1])->get();


        return view('front.show_cart',['product'=>$product],$result);
    }
    public function remove_from_cart(Request $request,$id){
        $model=Cart::find($id);
        $model->delete();
        return redirect('show_cart');
    }
    public function checkout(Request $request){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $customer_id=session()->get('CUSTOMER_ID');
        $product=DB::table('cart')->join('products','products.id','=','cart.product_id')->where(['customer_id'=>$customer_id])->select('products.*','cart.id as cart_id')->get();
        $customer=DB::table('customers')->where(['customer_id'=>$customer_id]);
        return view('front.checkout',['product'=>$product],$result);
    }
    public function order_now(Request $request)
    {
        $customer_id=session()->get('CUSTOMER_ID');
        return $all=Cart::where('customer_id',$customer_id)->get();
        foreach($all as $list){
            $order=new Order();
            $order->customer_id=$list['customer_id'];
            $order->product_id=$list['product_id'];
            $order->division=$request->post('division');
            $order->district=$request->post('district');
            $order->area=$request->post('area');
            $order->details_address=$request->post('details_address');
            $order->order_status=0;
            $order->delivery_status=0;
            $order->save();
        }
        return redirect('/');
    }
}

