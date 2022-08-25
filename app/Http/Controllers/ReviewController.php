<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Review::all();
        return view('admin.review',$result);
    }
    public function add_review(Request $request){
        $result['home_cat']=DB::table('categories')->where(['status'=>1])->where(['home'=>1])->get();
            $review=new Review;
            $review->customer_id=$request->session()->get('CUSTOMER_ID');
            $review->product_id=$request->product_id;
            $review->review=$request->review;
            $review->review_status=0;
            $review->save();
            return redirect('/');
    }
    public function review_status(Request $request,$review_status,$id){
        $model=Review::find($id);
        $model->review_status=$review_status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/order');        
    }
    public function delete(Request $request,$id){
        $model=Review::find($id);
        $model->delete();
        $request->session()->flash('message','Review Deleted');
        return redirect('admin/review');        
    }
}
