<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use App\password_reset;
use App\Mail\VerifyMail;
use App\Mail\RecoveryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    
    public function index(){
        return view('/auth/login');
    }

    public function login(Request $request){
        $user=$request->all();
            $username=preg_replace("/\s+/", "", $user['username']);
        $user_data=User::where('username', $username)->Where('deleted','=',0)->first();;
        $user_data= $user_data;
        //return $user_data;
        //$user=$request->all();
       
       // $user_data = DB::table('admin')->where('username', '=', $username)->get();

        if(is_null($user_data) || empty($user_data)){

            $Error_Message="Invalid username";
             return view('/auth/login', compact('Error_Message'));
        }
        else {
            
            $password=md5($user['password']);
        if($user_data['username'] == $username && $password==$user_data['password']){

           $request->session()->put('user', $username);
            return redirect('/');
           // return  $user_data;
        }

        else{

            $Error_Message="Invalid Login Credentials";
            
         return view('/auth/login', compact('Error_Message'));
        }
      
        }
       
        //if($user_data['username'] == $user['username']){
            //
       // }
      
            
       
       // return $this->index();

        //return view('pro-admin/dashboard');
    }

    public function register(){
        return view('/auth/register');
    }

    public function registergo(Request $request){

        $user=$request->all();
       
        $Error_Message="";
        $password_val=false;
        $email_val=false;
        $username_val=false;

        //checking for pass val
        if($user['pass1'] == $user['pass2']){
            $password_val=true;
            $password=md5($user['pass1']);
        }
        else{
            $password_val=false;
                $Error_Message.="<br> Entered Passwords does not Match";

        }

        //checking email exist
                $existing_user=User::where('email', '=',$user['email'])->first();
                if($existing_user != null){
                            
                     $email_val=false;
                     $Error_Message.="<br> Entered email Already exists";
                }
                else{
                    $email_val=true;

                } 
                
                
                //checking username exist
                $existing_user=User::where('username', '=',$user['username'])->first();
                if($existing_user != null){
                            
                     $username_val=false;
                     $Error_Message.="<br> Username Already exists";
                }
                else{
                    $username_val=true;

                }
       

        if($email_val && $username_val && $password_val)
        {

            $newuser=new User;

           
            $newuser->name=$user['name'];
            $newuser->username=preg_replace("/\s+/", "", $user['username']);
            $newuser->email=$user['email'];
            $newuser->phone=$user['phone'];
            $newuser->country=$user['country'];
            $newuser->password=$password;
            $newuser->save();
           session()->put('user', $user['username']);
            return redirect('/veriry/resend');
        }

       else {
           
                    
            //$Error_Message.="<br> Invalid username or email already in use";
            return view('auth/register', compact('Error_Message'));
        }
      

        





    }

    public function new(Request $request){

        
    }

    public function goverify(Request $request){
               $request=$request->all();
                    $user=User::where('email', '=',$request['email'])->first();

                    if($request['code'] ===$user->ver_token){

                                    $user->verified=1;
                                    $user->email_verified_at=time();
                                    $user->save();

                                    return view('auth/verified');

                    }

                    else{

                        $Error_Message="Invalid Verification Code";
                        return view('auth/verify', compact('Error_Message', 'user'));
                    }
    }

    
    
    public function verifynow($email, $code){
           
                   $user=User::where('email', '=',$email)->first();

                    if($code ===$user->ver_token){

                                    $user->verified=1;
                                    $user->save();

                                    return view('auth/verified');

                    }

                    else{

                        $Error_Message="Invalid Verification Code";
                        return view('auth/verify', compact('Error_Message', 'user'));
                    }
    }


   public function verify(){
        $user= new User;
        $user=$user->authen();
            if($user->authen()){

                if($user->verified){
                            redirect('/');

                }

                else{
                            return view('auth/verify', compact('user'));
                }
            }
            else{
                redirect('/login');
            }



    }

    public function sendverification(){
        $user= new User;
        $user=$user->authen();
        if($user->authen()){
                $token=mt_rand(100000, 999999);
                $user->ver_token=$token;
                $user->save();

                Mail::to($user->email)->send(new VerifyMail($user));
             
        // return new VerifyMail($user);


                    return redirect('/verify');
        }
    }
    
    
    

     public function recovery(){
       
                            return view('auth/recorver');
           



    }

    public function sendrecovery(Request $request){
            $data=$request->all();
            $email=$data['email'];
        if(isset($email)){

            $affected = DB::table('password_resets')->where('email', '=', $email)->update(array('status' => 1));
             $user=User::where('email', '=', $email)->first();
            if($user!= null){

               
                $token=mt_rand(10, 999999000);
                $token=md5($token);
                $password_reset=new password_reset;
                $password_reset->email=$user->email;
                $password_reset->token=$token;
                $password_reset->user=$user->username;
                $password_reset->save();

                   // return new RecoveryMail($password_reset,$user);

                Mail::to($user->email)->send(new RecoveryMail($password_reset, $user));
                $E_Message="We have sent you instructions to reset your password. Check your Email inbox to continue";
                return view('/recorver');


            }
            else{
                Session::flash('message', 'Account not found. <a href="/register"> Please sign up </a>. '); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('/recovery');
            }

        }

        else{
            Session::flash('message', 'Please enter a valid email'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/recovery');
        }
         
                
             
        // return new VerifyMail($user);


        
    }

    public function reset($email, $token){

           
        if(isset($email) && isset($token)){

            $password_reset=password_reset::where('email', '=', $email)->where('status','=',0)->first();
             $password_reset;
                if($password_reset!= null){
                    if($password_reset->token=$token){
                        $pass="true";
                        return view('/auth/changepassword', compact('pass', 'password_reset'));
                    }

                    else{
                        $error_Message='invalid token used!';
                        return view('/auth/changepassword', compact('error_Message'));
                    }
                }

                else{
                    $error_Message='invalid token used!';
                    return view('/auth/changepassword', compact('error_Message'));
                }
           // $affected = DB::table('password_resets')->where('email', '=', $email)->update(array('status' => 1));
            

        }

        else{

            return redirect('/recovery');
        }
         
                
             
        // return new VerifyMail($user);


        
    }


    public function changepassword(Request $request){
        $reset=$request->all();
        if($reset!=null){
           $email=$reset['email'];
           $token=$reset['token'];
           $password_reset=password_reset::where('email', '=', $email)->where('status','=',0)->first();
            
               if($password_reset!= null){
                   if($password_reset->token=$token){
                    if($reset['password1']==$reset['password2']){
                        $password=md5($reset['password2']);
                        $update = DB::table('users')->where('email', '=', $email)->update(array('password' => $password));
                        $affected = DB::table('password_resets')->where('email', '=', $email)->update(array('status' => 1));
                        return view('/auth/passwordchanged');
                    }
                else{
    
                    $Error_Message="Passwords does not match";
                          $pass="true";
                       return view('/auth/changepassword', compact('pass', 'password_reset', 'Error_Message'));
                   
                }
                 }

                   else{
                       $error_Message='invalid token used!';
                       return view('/auth/changepassword', compact('error_Message'));
                   }
               }

               else{
                   $error_Message='invalid token used!';
                   return view('/auth/changepassword', compact('error_Message'));
               }
      

           

           // $affected = DB::table('password_resets')->where('email', '=', $email)->update(array('status' => 1));
            

        }

        else{

            return redirect('/recovery');
        }
         
                
             
        // return new VerifyMail($user);


        
    }

    public function logout(){
        session()->forget('user');
        return redirect('/login');

    }



}
