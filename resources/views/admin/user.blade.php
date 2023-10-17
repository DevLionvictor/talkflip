@extends('admin.layout.master')

@section('title', 'Profile')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
          
    
            <div class="content-body">
        <div class="container-fluid card">
        <div class="card">  <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                 <h2 class="page-title">User Details</h2>
                    
                    
          
           
                            

                    <form action="/admin/user/save" method="post" enctype="multipart/form-data">
    
    @csrf
    <input type="hidden" name="id" value="{{$user->username}}">
    <div class="row"> 
              <div class="col-sm-8">
                 
          
         <div class="card">
          
         
         <div class="row form-group">
                  <div class="col-sm-12">
                       <label> Full Name:</label>
                      <input type="text" name="name"  value="{{$user['name']}}" class="form-control" required>
                  </div>  
        </div>

         
        
 
       
               


                <label> Country  </label>
                      <input type="text" name="country" id="wallet" value=" {{$user['country']}}" class="form-control">
                    <hr>  <h3>Balances </h3>
                      <div class="row m-t-25 justify-content-between">
                      
                     
                      
                        @foreach($wallets as $wallet)
            <div class="col-lg-4 col-md-6">
                        <div class="accordion accordion__walet">
                            <div class="card walet-info-card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#{{$wallet->title}}" aria-expanded="true" aria-controls="walet-info-one">
                                       {{$wallet->title}}
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div id="{{$wallet->title}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="walet-title">
                                            <i class="cc BTC currency-card--icon pull-left" title="BTC"></i>
                                            <h6>
                                                {{$wallet->title}}
                                            </h6>
                                            <p> {{$wallet->balance}}  {{$wallet->short}}</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    @endforeach     
                    </div>  
                     
</div>
        </div>
        
        <div class="col-sm-4">
            
             <div class="card">
            
                     
           <br>
            <br>
                     <label>Email Address:</label>
            <input type="email" name="email" value="<?php  print($user['email'])  ?>" class="form-control" required>  
            
            
                     <label>Phone:</label>
            <input type="phone" name="phone" value="<?php  print($user['phone'])  ?>" class="form-control" required>       
            
            
            <label>Username:</label>
            <input type="text" name="username" value="<?php  print($user['username'])  ?>" class="form-control" required readonly>    
            <h5>  <input type="checkbox" name="change_password" value="true"> Change Password</h5>
       <div class="form-group"> <label>Choose Password:</label>
            <input type="password" name="password1" class="form-control" >     
            
           
            <label>Confirm Password:</label>
            <input type="password" name="password2" class="form-control">               
          
            </div>
          
          
          
          
          
          
          
          
          
          
          
          
          
           
                  <br> 
            <label>Set Profile Image</label>
        <input type="file" name="photo"> 

        <input type="hidden" name="set-thumb" value="<?php print($user['photo'])  ?>">
      <hr>
           
      <button type="submit" name="update" value="true" class="btn btn-success">Save Changes</button>
        
        
        </div>
        </div>
            
         
           
            
            
                  
        </div>
   
             
            
            
          </form>

         
                </div>

                
            </div>

              
        </div>

    </div>

   




            <script>
            $(document).ready(function(){

                            @if(isset($Error_Message))
                                alert("{{$Error_Message}}");
                            @endif

            });

            </script>
            

            <!-- end main content-->
            @stop