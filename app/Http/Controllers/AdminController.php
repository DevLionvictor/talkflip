<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Offer;
use App\Asset;
use App\Stats;
use App\Trade;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
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
                  
                    $stats=new Stats;
                    $stats->offers=Offer::where('deleted', '=',0)->count();
                    $stats->trades=Trade::where('deleted', '=',0)->count();
                    $stats->active_trades=Trade::where('deleted', '=',0)->where('status','<', 4)->count();
                    $stats->assets=Asset::where('deleted', '=',0)->count();
                    $stats->users=User::where('deleted', '=',0)->count();

                        return view('admin/dashboard', compact('admin','stats'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }
            public function login(){
                return view('admin/login');
            }


    public function logingo(Request $request){
        $admin=$request->all();

        $admin_data=Admin::where('username', $admin['username'])->first();;
        $admin_data= $admin_data;
        //return $admin_data;
        //$admin=$request->all();
       
       // $admin_data = DB::table('admin')->where('username', '=', $admin['username'])->get();

        if(is_null($admin_data) || empty($admin_data)){

            $Error_Message="Invalid username";
             return view('/admin/login', compact('Error_Message'));
        }
        else {
            
            $password=md5($admin['password']);
        if($admin_data['username'] == $admin['username'] && $password==$admin_data['password']){

           $request->session()->put('admin', $admin['username']);
            return redirect('/admin');
           // return  $admin_data;
        }

        else{

            $Error_Message="Invalid Login Credentials";
            
         return view('/admin/login', compact('Error_Message'));
        }
      
        }
       
        //if($admin_data['username'] == $admin['username']){
            //
       // }
      
            
       
       // return $this->index();

        //return view('pro-admin/dashboard');
    }

    public function profile(){
        if($this->authen()){


            $admin=$this->authen();
          


                return view('admin/profile', compact('admin'));

        }

        else{

           return  redirect('/admin/login');
        }


    }


    public function saveprofile(Request $request){
        if($this->authen()){


            $admin=$this->authen();
          $profile=$request->all();
          $new_admin=Admin::where('username','=',$admin->username)->first();
          $new_admin->name=$profile['name'];
          $new_admin->email=$profile['email'];
          
          $new_admin->phone=$profile['phone'];

            if(isset($profile['change_password'])){
                    //checking for password val
                    if($profile['password1'] == $profile['password2']){
                            //true
                            $password=md5($request['password1']);
                            $new_admin->password=$password;

                    }
                    else{

                        $Error_Message="Passwords provided does not match!";
                        return view('/admin/profile', compact('admin', 'Error_Message'));
                    }

                
            }

            $new_admin->save();
                        

                return redirect('admin/profile');

        }

        else{

           return  redirect('/admin/login');
        }


    }


    public function offers(){


        if($this->authen()){


            $admin=$this->authen();
          

            $offers=offer::where('deleted', '='. 0)->orderBy('updated_at', 'DESC')->paginate(30);
            foreach($offers as $offer){
                $offer->asset_data=Asset::where('id', '=',$offer->asset)->first();
                $offer->asset_two_data=Asset::where('id', '=', $offer->asset_two)->first();
            }
           
                return view('admin/offers', compact('admin', 'offers'));

        }

        else{

           return  redirect('/admin/login');
        }



    }


    public function offerdestroy($id){


        if($this->authen()){


            $admin=$this->authen();
          

            $offer=offer::where('id', '=', $id)->first();
            $offer->deleted=1;
            $offer->save();
                return redirect('/admin/offers');

        }

        else{

           return  redirect('/admin/login');
        }



    }

    public function logout(){
        session()->forget('user');
        return redirect('/admin/login');

    }


}
