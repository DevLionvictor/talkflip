<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use App\Deposit;
use App\Debit;
use App\Asset;

use Illuminate\Http\Request;

class UserController extends Controller
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
                  
                        $users=User::where('deleted', '=', 0)->paginate(15);

                        return view('admin/users', compact('admin', 'users'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }
            public function new(){

                if($this->authen()){


                    $admin=$this->authen();
                  
                         

                        return view('admin/user', compact('admin'));
 
                }

                else{

                   return  redirect('/admin/login');
                }
            }


            public function update(Request $request){

                
                if($this->authen()){



                         $user=$request->all();
                    //checking for existing  user
                    if(!isset($user['id'])){
                        
                        

                        return back();
                    }

                    else{
                            
                        $new_user=User::where('username', '=',$user['id'])->first();
                        $new_user->name=$user['name'];
                        $new_user->phone=$user['phone'];
                        $new_user->country=$user['country'];
                        $new_user->email=$user['email'];

                        if(isset($user['change_password'])){
                            $new_user->password=md5($user['password2']);
                        }

                        $new_user->save();
                        return redirect('/admin/user/'.$new_user->username);
                    }
                    $admin=$this->authen();
                  
                         

                       return redirect('admin/user/'.$new_user->username);
 
                }

                else{

                   return  redirect('/admin/login');
                }
            }


            
    public function view($id){
            
        if($this->authen()){

            $user=User::where('username', '=', $id)->first();
                   
            $wallets=User::where('deleted', '=',0)->get();
            foreach($wallets as $wallet){
                $wallet->deposits=deposit::where('user', '=', $user->username)->where('user','=',$wallet->id)->where('status', '=',1)->sum('amount');
                $wallet->debits=debit::where('user', '=', $user->username)->where('user','=',$wallet->id)->where('status', '=',1)->sum('amount');
                $wallet->balance=$wallet->deposits-$wallet->debits;
            }
            $admin=$this->authen();
             return view('admin/user', compact('admin','user','wallets'));

        }

        else{

           return  redirect('/admin/login');
        }
    }
    public function destroy($id){
        if(!isset($id)){
                        
                        
               
           // return back();
        }

        else{

                    $user=User::where('id', '=',$id)->first(); 
                   
                    $user->deleted=1;
                    $user->save();
                    return back();


        }

    }
}
