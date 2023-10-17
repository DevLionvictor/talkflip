<?php

namespace App\Http\Controllers;
use App\User;
use App\Offer;
use App\Asset;
use App\Trade;
use App\Stats;
use App\Deposit;
use App\Debit;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //

    
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

                      /*  $wallets=Asset::where('deleted', '=',0)->paginate(10);
                        foreach($wallets as $wallet){
                            $wallet->deposits=deposit::where('user', '=', $user->username)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                            $wallet->debits=debit::where('user', '=', $user->username)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                            $wallet->balance=$wallet->deposits-$wallet->debits;
                        }*/

                       
                           // return $wallets=get_wallets($user->username);
                       $stats=new Stats; 
                       $stats->trades=Trade::where('buyer','=',$user->username)->orWhere('seller','=',$user->username)->count();
                       $stats->active_trades=Trade::where('buyer','=',$user->username)->orWhere('seller','=',$user->username)->where('status', '<', 4)->count();
                       $stats->done_trades=Trade::where('buyer','=',$user->username)->orWhere('seller','=',$user->username)->where('status', '>', 4)->count();
                       $stats->offers=Offer::where('user','=',$user->username)->count();
                        $market=Offer::where('deleted','=',0)->where('user','<>',$user->username)->paginate(10);
                        
                        foreach($market as $offer){
                            $offer->asset_data=Asset::where('id', '=', $offer->asset)->first();
                            $offer->asset_two_data=Asset::where('id', '=', $offer->asset_two)->first();

                }

                if(!$wallets=get_wallets($user->username)){
                  
                    return view('dashboard', compact('user', 'market', 'stats'));
   
                }
                        return view('dashboard', compact('user', 'market', 'stats','wallets'));

                    }

                    else{

                        return redirect('/verify');
                    }
                }

                else{

                   return  redirect('/login');
                }


    }


    public function transactions(){
        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                $debits=Debit::where('deleted', '=', 0)->where('user', '=', $user->username)->get();
                foreach($debits as $debit){
                    $debit->asset_data=Asset::where('id','=', $debit->asset)->first();
                }
                $deposits=Deposit::where('deleted', '=', 0)->where('user', '=', $user->username)->get();
                foreach($deposits as $deposit){
                    $deposit->asset_data=Asset::where('id','=', $deposit->asset)->first();
                }
                return view('transactions', compact('user', 'debits', 'deposits'));

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }



    public function market(){
        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                $offers=Offer::where('deleted', '=', 0)->where('user', '<>', $user->username)->paginate(30);
                foreach($offers as $offer){
                            $offer->asset_data=Asset::where('id', '=', $offer->asset)->first();
                            $offer->asset_two_data=Asset::where('id', '=', $offer->asset_two)->first();

                }
                return view('market', compact('user', 'offers'));

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }


    public function newtrade(){
        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

                        $assets=Asset::where('deleted', '=', 0)->get();
                        
              return view('newtrade', compact('user','assets'));

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }

    }

    public function savetrade(Request $request){
                    
        if($this->authen()){


            $user=$this->authen();
            if($user->verified){

               $user->username;
               $trade=$request->all();
                if($trade['role']=='seller'){

                      $amount=$trade['seller_amount'];
                        $asset=$trade['seller_asset'];
               }
                elseif($trade['role']=='buyer'){
                            $amount=$trade['buyer_amount'];
                            $asset=$trade['buyer_asset'];
                }
                
                $deposits=Deposit::where('user', '=', $user->username)->where('asset', '=', $asset)->where('status', '=', 1)->sum('amount');
                $debits=Debit::where('user', '=', $user->username)->where('asset', '=', $asset)->where('status', '=', 1)->sum('amount');
                   $balance=$deposits-$debits;
                    $total_amount=$amount*0.1;
                   if($balance<$total_amount){
                    $assets=Asset::where('deleted', '=', 0)->get();
                        $Error_Message='Balance too low to start a trading room please fund your account';
                    return view('newtrade', compact('user','assets', 'Error_Message'));
                   }


                   
               $code=mt_rand(99, 1000000);
               $txn='RM'.$code;
               $n_trade=new Trade;
               $n_trade->trx_id=$txn;
               $n_trade->asset=$trade['buyer_asset'];
               $n_trade->asset_two=$trade['seller_asset'];
               $n_trade->user=$user->username;
               $n_trade->buyer_amount=$trade['buyer_amount'];
               $n_trade->seller_amount=$trade['seller_amount'];

               if($trade['role']=='seller'){

                   $n_trade->seller=$user->username;

               }

               else{
                $n_trade->buyer=$user->username;

               }

               $n_trade->save();


              
             
           
                

                       return redirect('/trade/'.$n_trade->trx_id);

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }


    }
public function viewtrade($id){

    if($this->authen()){

        
        $user=$this->authen();
        if($user->verified){
                $trade=Trade::where('trx_id', '=', $id)->first();
                if($trade!=null){
               $trade->asset_data=Asset::where('id','=', $trade->asset)->first();
               $trade->asset_two_data=Asset::where('id','=', $trade->asset_two)->first();
            return view('trade', compact('user', 'trade'));}

            else{
               
                return view('notfound');
                
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



public function join(Request $request){
    $info=$request->all();
    $id=$info['id'];
    if($this->authen()){


        $user=$this->authen();
        if($user->verified){
                $trade=Trade::where('trx_id', '=', $id)->first();
                if($trade!=null){
                    if($trade->buyer==null){
                            $trade->buyer=$user->username;
                    }
                    else if($trade->seller==null){
                        $trade->seller=$user->username;
                    }
                    else{
                        $Error_Message='Trading room full! Access denied';
                        return view('joinroom', compact('user', 'Error_Message'));

                    }
                    $trade->save();
               $trade->asset_data=Asset::where('id','=', $trade->asset)->first();
               $trade->asset_two_data=Asset::where('id','=', $trade->asset_two)->first();
            return redirect('/trade/'.$trade->trx_id);
        }

            else{
               
                $Error_Message='Trading room not found! please enter a valid transaction id';
                return view('joinroom', compact('user', 'Error_Message'));
                
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



public function pay($trade){
   
    if($this->authen()){


        $user=$this->authen();
        if($user->verified){
                $trade_dat=Trade::where('trx_id', '=', $trade)->first();
                if($trade_dat!=null){
                    
                    if($trade_dat->buyer==$user->username){
                        $amount=$trade_dat->buyer_amount;
                        $asset=$trade_dat->asset;
                    }
                    else if($trade_dat->seller==$user->username){
                        $amount=$trade_dat->seller_amount;
                        $asset=$trade_dat->asset_two;
                        
                       
                    }

                    $wallet=get_balance($asset, $user->username);
                    if($wallet->balance<$amount){
                        $Error_Message='Balance too low. please fund the curremcy you are paying with';
                        //$trade->session()->flash('error', $Error_Message);
                        Session::put('error', $Error_Message); 
                       // Session::flash('alert-class', 'alert-danger');
                        return redirect('/trade/'.$trade);
                    }

                    else{

                       if(debit($user->username, $amount, $asset, 'Trade', 1)){
                        if($trade_dat->buyer==$user->username){
                                        $trade_dat->buyer_status=1;
                                        $trade_dat->save();
                                        if($trade_dat->seller_status==1){
                                            swap($trade);
                                        }
                        }
                        else if($trade_dat->seller==$user->username){

                            $trade_dat->seller_status=1;
                            $trade_dat->save();
                            if($trade_dat->buyer_status==1){
                                swap($trade);
                            }
                        }
                       

                    }
                    else{


                    }
                    }
                
            return redirect('/trade/'.$trade_dat->trx_id);
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


public function jform(){

    if($this->authen()){


        $user=$this->authen();
        if($user->verified){

             return view('joinroom', compact('user' ));

        }

        else{

            return redirect('/verify');
        }
    }

    else{

       return  redirect('/login');
    }

}
public function updateproof(Request $request){
    if($this->authen()){


        $user=$this->authen();
        if($user->verified){

                    $proof=$request->all();
                   
                    $trade=Trade::where('id','=',$proof['trade'])->first();
                    $image= $request->proof;
                    $fileName =$image->getClientOriginalName();  
           
              
           
                   $image->move(public_path('gallery'), $image->getClientOriginalName());
                   if($proof['mode']=='trader'){
                    $trade->trader_hash=$proof['hash'];
                    $trade->trader_proof=$image->getClientOriginalName();
                        
                }

                else{

                    $trade->reciever_hash=$proof['hash'];
                    $trade->reciever_proof=$image->getClientOriginalName();

                }
           
                   

                    $trade->save();
            return back();

        }

        else{

            return redirect('/verify');
        }
    }

    else{

       return  redirect('/login');
    }


}

public function accepttrade(Request $request){

    if($this->authen()){


        $user=$this->authen();
        if($user->verified){
                    $instr=$request->all();
                    $trade=Trade::where('id', '=',$instr['trade'])->first();
                    $trade->trader_instruction=$instr['trader_instruction'];
                    $trade->status=1;
                    $trade->save();

                //return $request;
            return back();

        }

        else{

            return redirect('/verify');
        }
    }

    else{

       return  redirect('/login');
    }


}

    public function trades(){

        if($this->authen()){


            $user=$this->authen();
            if($user->verified){


               $active_trades=Trade::where('buyer','=', $user->username)->orWhere('seller','=',$user->username)->get(); 
                foreach($active_trades as $trade){
                    $trade->asset_data=Asset::where('id','=',$trade->asset)->first();
                    $trade->asset_two_data=Asset::where('id','=',$trade->asset_two)->first();
                }
                   
                   $history=Trade::where('user','=', $user->username)->where('status','=',4)->get(); 
                return view('trades', compact('user','active_trades','active_recieves', 'history'));

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }


    }
public function trade(){
    if($this->authen()){


        $user=$this->authen();
        if($user->verified){


            return view('trade', compact('user'));

        }

        else{

            return redirect('/verify');
        }
    }

    else{

       return  redirect('/login');
    }
}

         public function profile(){

            if($this->authen()){


                $user=$this->authen();
                if($user->verified){


                    return view('profile', compact('user'));

                }

                else{

                    return redirect('/verify');
                }
            }

            else{

               return  redirect('/login');
            }

        }

        public function saveprofile(Request $request){
            if($this->authen()){
    
    
                $user=$this->authen();
              $profile=$request->all();
              $new_user=User::where('username','=',$user->username)->first();
              $new_user->name=$profile['name'];
              $new_user->country=$profile['country'];
              
              $new_user->phone=$profile['phone'];
    
                if(isset($profile['change_password'])){
                        //checking for password val
                        if($profile['password1'] == $profile['password2']){
                                //true
                                $password=md5($request['password1']);
                                $new_user->password=$password;
    
                        }
                        else{
    
                            $Error_Message="Passwords provided does not match!";
                            return view('/profile', compact('user', 'Error_Message'));
                        }
    
                    
                }
    
                $new_user->save();
                            
    
                    return redirect('/profile');
    
            }
    
            else{
    
               return  redirect('/login');
            }
    
    
        }




    
}
