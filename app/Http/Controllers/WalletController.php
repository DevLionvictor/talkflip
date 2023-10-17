<?php

namespace App\Http\Controllers;

use App\User;
use App\Asset;
use App\Deposit;
use App\Debit;
use App\Withdrawal;
use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
        
    public function authen(){
    
        $user=session('user');
        if(!isset($user))
        {
           // die('login failed');
            return false;
    
        }else{
            return $user=user::where('username', '=', $user)->first();
     
        }
    }
    
    public function index(){

                if($this->authen()){


                    $user=$this->authen();
                    if($user->verified){

                     
                        if(!$mywallets=get_wallets($user->username)){
                  
                            return view('wallet', compact('user'));
           
                        }
                          
                          return view('wallet', compact('user', 'mywallets'));
               
                        
                        

                    }

                    else{

                        return redirect('/verify');
                    }
                }

                else{

                   return  redirect('/login');
                }


    }
    

    public function apiindex($id){

                if($this->authen()){


                    $user=$this->authen();
                    if($user->verified){

                     
               $wallet=Asset::where('id', '=',$id)->first();
                       
                            $wallet->deposits=deposit::where('user', '=', $user->username)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                            $wallet->debits=debit::where('user', '=', $user->username)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                            $wallet->balance=$wallet->deposits-$wallet->debits;
                        

                       return $wallet;
                          //return view('wallet', compact('user', 'wallets'));
               
                        
                        

                    }

                    else{

                       return 505;
                    }
                }

                else{

                  return 303;
                }


    }


    public function deposit(){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

              $assets=Asset::where('deleted','=', 0)->get();
              $pending=Deposit::where('deleted','=',0)->where('status','=',0)->where('user','=',$user->username)->get();
              foreach($pending as $deposit){
                  $deposit->asset_data=Asset::where('id', '=', $deposit->asset)->first();


              }
                  return view('deposit', compact('user','assets','pending'));
       
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }


    public function savedeposit(Request $request){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                    $deposit=$request->all();
                    $new_deposit=new Deposit;
                    $new_deposit->amount=$deposit['amount'];
                    $new_deposit->asset=$deposit['asset'];
                    $new_deposit->user=$user->username;

                    $new_deposit->save();

       
                  return redirect('/pay/'.$new_deposit['id']);
       
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }





    public function saveproof(Request $request){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                    $proof=$request->all();
                    $deposit=Deposit::where('id','=',$proof['id'])->first();
                    $deposit->comment=$proof['comment'];
                    $image= $request->proof;
                    $fileName =$image->getClientOriginalName(); 
                    $deposit->proof=$fileName; 
           
              
           
                   $image->move(public_path('gallery'), $image->getClientOriginalName());
                  

                    $deposit->save();

       
                  return redirect('/pay/'.$deposit['id']);
       
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }




    public function pay($id){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                    $deposit=Deposit::where('id','=', $id)->first();
                    $deposit->asset_data=Asset::where('id','=', $deposit->asset)->first();
                    

       
                  return view('pay', compact('user','deposit'));
       
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }



    public function destroy($id){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                    $deposit=Deposit::where('id','=', $id)->where('status','=',0)->first();
                    if ($deposit !== null){
                        $deposit->deleted=1;
                        $deposit->save();

                        return redirect('/deposit');
       
                    }
                    else{

                        return back();
                    }
                    

       
                 
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }




    public function withdraw(Request $request){


        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

               $withdrawal=$request->all();
                $new=new Withdrawal;
                $new->asset=$withdrawal['asset'];
                $new->amount=$withdrawal['amount'];
                $new->instruction=$withdrawal['instruction'];
                $new->user=$user->username;
                $new->save();
                $info="Your withdrawal request has been sent and pending processing";
                   return view('withdraw', compact('user', 'info'));

       
                 
                
                

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }


}
