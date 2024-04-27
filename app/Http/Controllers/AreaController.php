<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Area::all();
        return view('admin.area',$result);
    }
    public function manage_area(Request $request,$id='')
    {
        if($id>0){
            $arr=area::where(['id'=>$id])->get();

            $result['district_id']=$arr['0']->district_id;
            $result['zone_id']=$arr['0']->zone_id;
            $result['title_area']=$arr['0']->title_area;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id; 
        }
        else{
            $result['district_id']='';
            $result['zone_id']='';
            $result['title_area']='';
            $result['status']='';
            $result['id']=0; 
        }

        $result['district']=DB::table('districts')->where(['status'=>1])->get();
        $result['zone']=DB::table('zones')->where(['status'=>1])->get();
        return view('admin.manage_area',$result);  
    }
    public function manage_area_process(Request $request)
    {
        //$request->validate([
            //'title'=>'required',
            //'code'=>'required|unique:vouchers,code',
            //'value'=>'required',
            //'min_order_amount'=>'required',
        //]);
        if($request->post('id')>0){
            $model=Area::find($request->post('id'));
            $msg="Area updated successfully";
        }
        else{
            $model=new area();
            $msg="Area added successfully";
        }
        $model->district_id=$request->post('district_id');
        $model->zone_id=$request->post('zone_id');
        $model->title_area=$request->post('title_area');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/area');
    }
    public function delete(Request $request,$id){
        $model=Area::find($id);
        $model->delete();
        $request->session()->flash('message','Zone removed successfully');
        return redirect('admin/zone');        
    }
    public function status(Request $request,$status,$id){
        $model=Area::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/zone');        
    }

}
