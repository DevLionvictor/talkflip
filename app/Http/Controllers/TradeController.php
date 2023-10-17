<?php

namespace App\Http\Controllers;
use App\Trade;
use App\Admin;
use App\Asset;

use Illuminate\Http\Request;

class TradeController extends Controller
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
                  
                        $trades=Trade::where('deleted', '=', 0)->paginate(15);
                        foreach($trades as $trade){
                            $trade->asset_data=Asset::where('id','=',$trade->asset)->first();
                            $trade->asset_two_data=Asset::where('id','=',$trade->asset_two)->first();
                        }

                        return view('admin/trades', compact('admin', 'trades'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }
    public function view($id){
            
        if($this->authen()){

            $trade=Trade::where('id', '=', $id)->first();
            $trade->asset_data=Asset::where('id','=',$trade->asset)->first();
            $trade->asset_two_data=Asset::where('id','=',$trade->asset_two)->first();
            $admin=$this->authen();
             return view('admin/trade', compact('admin','trade'));

        }

        else{

           return  redirect('/admin/login');
        }
    }


    public function updatestatus(Request $request){

        if($this->authen()){

          $update=$request->all();
          $trade=Trade::where('id','=',$update['trade'])->first();
          $trade->status=$update['status'];
          $trade->save();
            $admin=$this->authen();
             return back();

        }

        else{

           return  redirect('/admin/login');
        }


    }
    public function destroy($id){
        if($this->authen()){
                    $asset=Asset::where('id','=',$id)->first();
                    $asset->deleted=1;
                    $asset->save();

                    return redirect('/admin/assets');

        }
        else{

            return  redirect('/admin/login');
         }

    }
}
