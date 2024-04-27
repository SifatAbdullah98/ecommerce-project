<?php

namespace App\Http\Controllers;

use App\Models\district;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=District::all();
        return view('admin.district',$result);
    }
    public function manage_district(Request $request,$id='')
    {
        if($id>0){
            $arr=district::where(['id'=>$id])->get();

            $result['title']=$arr['0']->title;
            $result['charge']=$arr['0']->value;
            $result['id']=$arr['0']->id;            
        }
        else{
            $result['title']='';
            $result['charge']='';
            $result['id']=''; 
        }
        return view('admin.manage_district',$result); 
    }
    public function manage_district_process(Request $request)
    {
        //$request->validate([
            //'title'=>'required',
            //'code'=>'required|unique:vouchers,code',
            //'value'=>'required',
            //'min_order_amount'=>'required',
        //]);
        if($request->post('id')>0){
            $model=District::find($request->post('id'));
            $msg="District updated successfully";
        }
        else{
            $model=new district();
            $msg="District added successfully";
        }
        $model->title=$request->post('title');
        $model->charge=$request->post('charge');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/district');
    }
    public function delete(Request $request,$id){
        $model=District::find($id);
        $model->delete();
        $request->session()->flash('message','District removed successfully');
        return redirect('admin/district');        
    }
    public function status(Request $request,$status,$id){
        $model=District::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/district');        
    }
}
