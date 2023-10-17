<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Asset;

use Illuminate\Http\Request;

class AssetController extends Controller
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
                  
                        $assets=Asset::where('deleted', '=', 0)->paginate(15);

                        return view('admin/assets', compact('admin', 'assets'));
 
                }

                else{

                   return  redirect('/admin/login');
                }


    }
            public function new(){

                if($this->authen()){


                    $admin=$this->authen();
                  
                         

                        return view('admin/asset', compact('admin'));
 
                }

                else{

                   return  redirect('/admin/login');
                }
            }


            public function save(Request $request){

                
                if($this->authen()){



                         $asset=$request->all();
                    //checking for existing  asset
                    if(!isset($asset['id'])){
                        
                        $new_asset= new Asset;
                        $new_asset->title=$asset['title'];
                        $new_asset->short=$asset['short'];
                        $new_asset->description=$asset['description'];
                        $new_asset->instruction=$asset['instruction'];
                        $new_asset->save();

                        return redirect('/admin/assets');
                    }

                    else{
                            
                        $new_asset=Asset::where('id', '=',$asset['id'])->first();
                        $new_asset->title=$asset['title'];
                        $new_asset->short=$asset['short'];
                        $new_asset->description=$asset['description'];
                        $new_asset->instruction=$asset['instruction'];
                        $new_asset->save();
                        return redirect('/admin/asset/'.$new_asset->id);
                    }
                    $admin=$this->authen();
                  
                         

                        return view('admin/asset', compact('admin'));
 
                }

                else{

                   return  redirect('/admin/login');
                }
            }


            
    public function view($id){
            
        if($this->authen()){

            $asset=Asset::where('id', '=', $id)->first();
            $admin=$this->authen();
             return view('admin/asset', compact('admin','asset'));

        }

        else{

           return  redirect('/admin/login');
        }
    }
    public function destroy($id){
        $asset=Asset::where('id','=',$id)->first();
        $asset->deleted=1;
        $asset->save();

        return redirect('/admin/assets');
    }
            public function login(){
                return view('admin/login');
            }

}
