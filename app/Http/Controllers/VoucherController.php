<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $result['data']=Voucher::all();
        return view('admin.voucher',$result);
    }
    public function manage_voucher(Request $request,$id='')
    {
        if($id>0){
            $arr=voucher::where(['id'=>$id])->get();

            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['type']=$arr['0']->type;
            $result['min_order_amount']=$arr['0']->min_order_amount;
            $result['is_one_time']=$arr['0']->is_one_time;
            $result['id']=$arr['0']->id;            
        }
        else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['type']='';
            $result['min_order_amount']='';
            $result['is_one_time']='';
            $result['id']=''; 
        }
        return view('admin.manage_voucher',$result); 
    }
    public function manage_voucher_process(Request $request)
    {
        $request->validate([
            'title'=>'required',
            //'code'=>'required|unique:vouchers,code',
            'value'=>'required',
            'min_order_amount'=>'required',
        ]);
        if($request->post('id')>0){
            $model=Voucher::find($request->post('id'));
            $msg="Voucher updated successfully";
        }
        else{
            $model=new voucher();
            $msg="Voucher added successfully";
        }
        $model->title=$request->post('title');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->type=1;
        $model->min_order_amount=$request->post('min_order_amount');
        $model->is_one_time=1;
        $model->status=0;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/voucher');
    }
    public function delete(Request $request,$id){
        $model=Voucher::find($id);
        $model->delete();
        $request->session()->flash('message','Voucher removed successfully');
        return redirect('admin/voucher');        
    }
    public function status(Request $request,$status,$id){
        $model=Voucher::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('admin/voucher');        
    }
    public function type(Request $request,$type,$id){
        $model=Voucher::find($id);
        $model->type=$type;
        $model->save();
        $request->session()->flash('message','Type updated');
        return redirect('admin/voucher');        
    }
    public function is_one_time(Request $request,$is_one_time,$id){
        $model=Voucher::find($id);
        $model->is_one_time=$is_one_time;
        $model->save();
        $request->session()->flash('message','Type updated');
        return redirect('admin/voucher');        
    }
}
