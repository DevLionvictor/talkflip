<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Debit;
use App\Asset;
use App\User;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    //
    public function authen(){
    
        $admin=session('admin');
        if(!isset($admin))
        {
           // die('login failed');
            return false;
    
        }else{
            return $admin=admin::where('username', '=', $admin)->first();
     
        }
    }
    
    public function index(){

                if($this->authen()){


                    $admin=$this->authen();
                 
                   $debits=Debit::where('deleted','=',0)->orderBy('Updated_at', 'DESC')->get();
                    foreach($debits as $debit){
                        $debit->asset_data=Asset::where('id','=',$debit->asset)->first();
                    } 
                    return view('admin/debits', compact('admin','debits'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    } 
    
   


    public function confirm($id){

                if($this->authen()){

                        $data=Debit::where('id', '=', $id)->first();
                        $data->status=1;
                        $data->save();
                        $debit=new debit;
                        $debit->amount=$data->amount;
                        $debit->asset=$data->asset;
                        $debit->user=$data->user;
                        $debit->comment='Debit';
                        $debit->status=1;
                        $debit->save();
                   return redirect('admin/debits');
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }




    public function new(){

                if($this->authen()){
                    $admin=$this->authen();
                    $users=User::where('deleted','=',0)->get();
                        $assets=Asset::where('deleted', '=',0)->get();
                   return view('admin/debit', compact('admin','assets','users'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }


    
    public function save(Request $request){

        if($this->authen()){
            $admin=$this->authen();

             $debit=$request->all();
            $new_debit=new debit;
            $new_debit->asset=$debit['asset'];
            $new_debit->user=$debit['user'];
            $new_debit->amount=$debit['amount'];
            $new_debit->source=$debit['source'];
            $new_debit->status=1;

            $new_debit->save();
           return redirect('admin/deits');

        }

        else{

           return  redirect('/admin/login');
        }


}

}
