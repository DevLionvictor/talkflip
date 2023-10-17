<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Deposit;
use App\Asset;
use App\User;
use Illuminate\Http\Request;

class DepositController extends Controller
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
                  $deposits=new deposit;
                   $deposits->pending=Deposit::where('deleted','=',0)->where('status','=',0)->orderBy('updated_at','DESC')->get();
                   $deposits->confirmed=Deposit::where('deleted','=',0)->where('status','=',1)->orderBy('updated_at','DESC')->get();
                    foreach($deposits->pending as $deposit){
                        $deposit->asset_data=Asset::where('id','=',$deposit->asset)->first();
                    } 
                    foreach($deposits->confirmed as $deposit){
                        $deposit->asset_data=Asset::where('id','=',$deposit->asset)->first();
                    }
                        return view('admin/deposits', compact('admin','deposits'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }



    public function confirm($id){

                if($this->authen()){

                        $deposit=Deposit::where('id', '=', $id)->first();
                        $deposit->status=1;
                        $deposit->save();
                   return redirect('admin/deposits');
 
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
                   return view('admin/deposit', compact('admin','assets','users'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }  
    
    public function save(Request $request){

                if($this->authen()){
                    $admin=$this->authen();

                     $deposit=$request->all();
                    $new_deposit=new deposit;
                    $new_deposit->asset=$deposit['asset'];
                    $new_deposit->user=$deposit['user'];
                    $new_deposit->amount=$deposit['amount'];
                    $new_deposit->source=$deposit['source'];
                    $new_deposit->status=1;

                    $new_deposit->save();
                   return redirect('admin/deposits#navpills-2');
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }
}
