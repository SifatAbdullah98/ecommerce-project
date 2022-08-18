<?php

namespace App\Http\Controllers;

use App\Models\Front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        foreach($result['home_cat'] as $list){
            $result['home_cat_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['category_id'=>$list->id])->get();
            foreach($result['home_cat_product'][$list->id] as $list1){
                        $result['home_product_attr'][$list1->id]=DB::table('products_attr')
                        ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$list1->id])->get();         
            }
        }
            $result['home_featured_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_featured'=>1])->get();
            foreach($result['home_featured_product'][$list->id] as $list1){
                        $result['home_featured_product_attr'][$list1->id]=DB::table('products_attr')
                        ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$list1->id])->get();         
            }
            $result['home_popular_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_trending'=>1])->get();
            foreach($result['home_popular_product'][$list->id] as $list1){
                        $result['home_popular_product_attr'][$list1->id]=DB::table('products_attr')
                        ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$list1->id])->get();         
            }
            $result['home_discounted_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_discounted'=>1])->get();
            foreach($result['home_discounted_product'][$list->id] as $list1){
                        $result['home_discounted_product_attr'][$list1->id]=DB::table('products_attr')
                        ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$list1->id])->get();         
            }
        return view('front.index',$result);
    }
    
    public function category(Request $request,$category_slug){
        $result['product']=DB::table('products')->leftjoin('categories','categories.id','=','products.category_id')->where(['categories.category_slug'=>$category_slug])->get();
        foreach($result['product'] as $list1){
                    $result['product_attr'][$list1->id]=DB::table('products_attr')
                    ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                    ->where(['products_attr.product_id'=>$list1->id])->get();
        }
        return view('front.category',$result);
    }
            
    public function product(Request $request,$product_slug){
        $result['product']=DB::table('products')->where(['status'=>1])->where(['product_slug'=>$product_slug])->get();
            foreach($result['product'] as $list1){
                        $result['product_attr'][$list1->id]=DB::table('products_attr')
                        ->leftjoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$list1->id])->get();         
            }
        return view('front.product',$result);
    }
    public function registration(Request $request){
        $result=[];
        return view('front.registration',$result);
    }
    public function registration_process(Request $request)
    {
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->phone=$request->post('phone');
        $model->password=$request->post('password');
        $model->status=1;
        $model->save();
        $pid=$model->id;

        $request->session()->flash('message',$msg);
        return redirect('');
    }
}
