@extends('admin.layout.master')

@section('title', 'Profile')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
          
    <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                    <h2 class="page-title">Profile</h2>
                    
                 
     
                 <form class="" action="/admin/profile/save" method="post" enctype="multipart/form-data">
         @csrf
         <div class="container">
         
               <div class="row" > 
                         <div class="col-sm-8">
                            
                             
                     
                      <div class="dp-box" style="background-color:grey;">
                      <img src="/gallery/<?php print($admin['photo']) ?>" class="avatar" id="av-box" width="300px">
                     <span class="fa fa-camera" id="but">  </span>
                         
     
             </div>
             <input type="file" onchange="getImage()"  id="file_input" name="new_dp" style="display:none;">
               <input type="hidden" name="static_dp" value="<?php print($admin['photo']) ?>" >
     
                    
                     
                    
                    <div class="row form-group" style="margin-top:80px;">
                    <div class="col-sm-12">
                        <div id="user-id"><strong>User Id:</strong><?php print($admin['username']);  ?></div>
                             <label> Name: </label>
                             <input type="text" name="name" value="<?php  print($admin['name']) ?>" class="form-control"> 
                             
                             
                          
                           <label> Email: </label>
                            <input type="text" name="email" value="<?php  print($admin['email']) ?>" class="form-control"> 
                          
                             <label> Phone: </label>
                            <input type="text" name="phone" value="<?php  print($admin['phone']) ?>" class="form-control"> 
                             
                            </div>
                            
                           
                         
             
                              
                                  
                             
                             
                             <div class="col-sm-6">
                            
                           
                   </div>
                 
                   </div>
                                 
                   
                   </div>
                   
                   <div class="col-sm-4 widget">
                       
                       <div class="nav" style="float:right;">
                           
                           
                             </div>
                       <br>
                       <br>
     
                       
                         <hr />
                           <h5>  <input type="checkbox" name="change_password" value="true"> Change Password</h5>
                            
                            <label>Current Password:</label>
                     <input type="password" name="current_password" id="current-password"  class="form-control">     
                             
                             <label>New Password:</label>
                     <input type="password" name="password1" id="password1"  class="form-control">       
                         <label>Verify Password:</label>
                     <input type="password" name="password2" id="password2"  class="form-control">
                         
                         <br>
           
                     
                               
                    
                      
                       
                       
                             
                   </div>
     
                   <div class="col-sm-12">
                         
                  <br> <button type="submit" name="update" value="true" class="btn btn-danger">Save Profile</button>
                     
                     
                     
               
               </div>
     
     
               <div class="col-sm-6 well">
             
               </div>
                       </div>
                       
                       
                     </form>
                             </div>
                            
                   
                     
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