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
        $result['category']=DB::table('categories')->where(['status'=>1])->where(['home'=>0])->get();
        foreach($result['home_cat'] as $list){
            $result['home_cat_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['category_id'=>$list->id])->get();
        }
            $result['home_featured_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_featured'=>1])->get();
            $result['home_popular_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_trending'=>1])->get();
            $result['home_discounted_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_discounted'=>1])->get();
        return view('front.index',$result);
    }
    
    public function category(Request $request,$id){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $result['category']=DB::table('categories')->where(['status'=>1])->where(['parent_category_id'=>$id])->get();
        $result['product']=DB::table('products')->join('categories','categories.id','=','products.category_id')->where(['categories.id'=>$id])->get();
        return view('front.category',$result);
    }
    public function category_product(Request $request,$id){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $result['product']=DB::table('products')->where(['status'=>1])->where(['category_id'=>$id])->get();
        return view('front.category_product',$result);
    }
            
    public function product(Request $request,$product_slug){
        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
        $result['product']=DB::table('products')->where(['status'=>1])->where(['product_slug'=>$product_slug])->get();
        $result['products']=DB::table('products')->join('categories','categories.id','=','products.category_id')->where(['product_slug'=>$product_slug])->get();
        $result['review']=DB::table('reviews')->join('products','products.id','=','reviews.product_id')->join('customers','customers.id','=','reviews.customer_id')->where(['product_slug'=>$product_slug])->where(['review_status'=>1])->get();
        return view('front.product',$result);
    }
}
