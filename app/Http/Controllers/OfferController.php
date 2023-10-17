<?php

namespace App\Http\Controllers;
use App\Offer;
use App\User;
use App\Asset;

use Illuminate\Http\Request;

class OfferController extends Controller
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

                    $offers=Offer::where('deleted', '=', 0)->where('user', '=', $user->username)->paginate(15);
                    foreach($offers as $offer){
                        $offer->asset_data=Asset::where('id','=',$offer->asset)->first();
                        $offer->asset_two_data=Asset::where('id','=',$offer->asset_two)->first();
                    }
                return view('offers', compact('user', 'offers'));

            }

            else{

                return redirect('/verify');
            }
        }

        else{

           return  redirect('/login');
        }


}


public function view($id){
    if($this->authen()){


        $user=$this->authen();
        if($user->verified){
            $assets=Asset::where('deleted', '=', 0)->get();
            $offer=Offer::where('id', '=', $id)->first();
           
            $offer->asset_data=Asset::where('id', '=',$offer->asset)->first();
            $offer->asset_two_data=Asset::where('id', '=',$offer->asset_two)->first();
            $offer->user_data=User::where('username', '=',$offer->user)->first();
            return view('/offer', compact('user', 'offer', 'assets'));
        }

        else{

            return redirect('/verify');
        }
    }

    else{

       return  redirect('/login');
    }


      


}

        public function new(){

            if($this->authen()){


                $user=$this->authen();
                if($user->verified){

                        $assets=Asset::where('deleted','=',0)->get();
                         
                    return view('offer', compact('user', 'assets'));
    
                }
    
                else{
    
                    return redirect('/verify');
                }
            }
    
            else{
    
               return  redirect('/login');
            }
        }
   



public function save(Request $request){

            if($this->authen()){


                $user=$this->authen();
                if($user->verified){
                        $offer_data=$request->all();
                        if(isset($offer_data['id'])){
                            $new=Offer::where('id','=',$offer_data['id'])->first();
                        }
                        else{
                            $new=new Offer;
                        }
                       
                        $new->asset=$offer_data['asset'];
                        $new->asset_two=$offer_data['asset_two'];
                        $new->rate=$offer_data['rate'];
                        $new->available=$offer_data['available'];
                       // $new->public=$offer_data['public'];
                        $new->user=$user->username;
                        $new->save();
                        
                        return redirect('/offer/'.$new->id);
                         
                         
                   
    
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

                    return $offer=Offer::where('id','=',$id)->where('user','=',$user->username)->first();
                        $offer->deleted=1;
                        $offer->save();
                         
                    return redirect('/offers');
    
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
