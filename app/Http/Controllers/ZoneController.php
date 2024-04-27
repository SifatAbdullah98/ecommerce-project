<?php

namespace App\Http\Controllers;

use App\Models\zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Zone::all();
        return view('admin.zone',$result);
    }
    public function manage_zone(Request $request,$id='')
    {
        if($id>0){
            $arr=zone::where(['id'=>$id])->get();

            $result['district_id']=$arr['0']->district_id;
            $result['title_zone']=$arr['0']->title_zone;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id; 
        }
        else{
            $result['district_id']='';
            $result['title_zone']='';
            $result['status']='';
            $result['id']=0; 
        }

        $result['district']=DB::table('districts')->where(['status'=>1])->get();
        return view('admin.manage_zone',$result); 
    }
    public function manage_zone_process(Request $request)
    {
        //$request->validate([
            //'title'=>'required',
            //'code'=>'required|unique:vouchers,code',
            //'value'=>'required',
            //'min_order_amount'=>'required',
        //]);
        if($request->post('id')>0){
            $model=Zone::find($request->post('id'));
            $msg="Zone updated successfully";
        }
        else{
            $model=new zone();
            $msg="Zone added successfully";
        }
        $model->district_id=$request->post('district_id');
        $model->title_zone=$request->post('title_zone');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/zone');
    }
    public function delete(Request $request,$id){
        $model=Zone::find($id);
        $model->delete();
        $request->session()->flash('message','Zone removed successfully');
        return redirect('admin/zone');        
    }
    public function status(Request $request,$status,$id){
        $model=Zone::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/zone');        
    }
}
