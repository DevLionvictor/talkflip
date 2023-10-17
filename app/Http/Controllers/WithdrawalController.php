<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Withdrawal;
use App\Asset;
use App\Debit;
use App\User;

class WithdrawalController extends Controller
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
                  $withdrawals=new withdrawal;
                   $withdrawals->pending=Withdrawal::where('deleted','=',0)->where('status','=',0)->get();
                   $withdrawals->confirmed=Withdrawal::where('deleted','=',0)->where('status','=',1)->get();
                    foreach($withdrawals->pending as $withdrawal){
                        $withdrawal->asset_data=Asset::where('id','=',$withdrawal->asset)->first();
                    } 
                    foreach($withdrawals->confirmed as $withdrawal){
                        $withdrawal->asset_data=Asset::where('id','=',$withdrawal->asset)->first();
                    }
                        return view('admin/withdrawals', compact('admin','withdrawals'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    } 
    
   


    public function confirm($id){

                if($this->authen()){

                        $data=Withdrawal::where('id', '=', $id)->first();
                        $data->status=1;
                        $data->save();
                        $debit=new debit;
                        $debit->amount=$data->amount;
                        $debit->asset=$data->asset;
                        $debit->user=$data->user;
                        $debit->comment='Withdrawal';
                        $debit->status=1;
                        $debit->save();
                   return redirect('admin/withdrawals');
 
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
}
