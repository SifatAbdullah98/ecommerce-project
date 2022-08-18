<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Product::all();
        return view('admin.product',$result);
    }
    public function manage_product(Request $request,$id='')
    {
        if($id>0){
            $arr=product::where(['id'=>$id])->get();

            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['product_slug']=$arr['0']->product_slug;  
            $result['description']=$arr['0']->description;
            $result['keywords']=$arr['0']->keywords;
            $result['price']=$arr['0']->price;
            $result['discount_price']=$arr['0']->discount_price;
            $result['is_featured']=$arr['0']->is_featured;
            $result['is_discounted']=$arr['0']->is_discounted;
            $result['is_trending']=$arr['0']->is_trending;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id; 
            
            $result['productAttrArr']=DB::table('products_attr')->where(['product_id'=>$id])->get();
        }
        else{
            $result['category_id']='';
            $result['name']='';
            $result['iamage']='';
            $result['product_slug']='';  
            $result['description']='';
            $result['keywords']='';
            $result['price']='';
            $result['discount_price']='';
            $result['is_featured']='';
            $result['is_discounted']='';
            $result['is_trending']='';
            $result['status']='';
            $result['id']=0; 

            $result['productAttrArr'][0]['product_id']='';
            $result['productAttrArr'][0]['size_id']='';
            $result['productAttrArr'][0]['qty']='';
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['size']=DB::table('sizes')->where(['status'=>1])->get();
        return view('admin.manage_product',$result); 
    }
    public function manage_product_process(Request $request)
    {
            $image_validation="required|mimes:jpg,jpeg,png";

        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            'product_slug'=>'required|unique:products,product_slug,'.$request->post('id'),
        ]);
        
        if($request->post('id')>0){
            $model=Product::find($request->post('id'));
            $msg="Product updated successfully";
        }
        else{
            $model=new product();
            $msg="Product added successfully";
        }
        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }

        $model->category_id=$request->post('category_id');
        $model->name=$request->post('name');
        $model->product_slug=$request->post('product_slug');
        $model->description=$request->post('description');
        $model->price=$request->post('price');
        $model->keywords=$request->post('keywords');
        $model->discount_price=$request->post('discount_price');
        $model->is_featured=0;
        $model->is_discounted=0;
        $model->is_trending=0;
        $model->status=1;
        $model->save();
        $pid=$model->id;

        //Product Attributes
        /*$skuArr=$request->post('sku');
        $priceArr=$request->post('price');
        $discount_priceArr=$request->post('discount_price');
        $size_idArr=$request->post('size_id');
        $qtyArr=$request->post('qty');
        foreach($skuArr as $key=>$val){
            $productAttrArr['product_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['price']=$priceArr[$key];
            $productAttrArr['discount_price']=$discount_priceArr[$key];
            $productAttrArr['size_id']=$size_idArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
            DB::table('products_attr')->insert($productAttrArr);
        }*/
        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }
    public function delete(Request $request,$id){
        $model=Product::find($id);
        $model->delete();
        $request->session()->flash('message','Product removed successfully');
        return redirect('admin/product');        
    }
    public function status(Request $request,$status,$id){
        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/product');        
    }
    public function is_featured(Request $request,$is_featured,$id){
        $model=Product::find($id);
        $model->is_featured=$is_featured;
        $model->save();
        $request->session()->flash('message','Product added to featured product');
        return redirect('admin/product');        
    }
    public function is_discounted(Request $request,$is_discounted,$id){
        $model=Product::find($id);
        $model->is_discounted=$is_discounted;
        $model->save();
        $request->session()->flash('message','Product added to discounted product');
        return redirect('admin/product');        
    }
    public function is_trending(Request $request,$is_trending,$id){
        $model=Product::find($id);
        $model->is_trending=$is_trending;
        $model->save();
        $request->session()->flash('message','Product added to trending product');
        return redirect('admin/product');        
    }
}
