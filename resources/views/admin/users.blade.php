@extends('admin.layout.master')

@section('title', 'Trades')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
    <div class="content-body">
        <div class="container-fluid">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                    <h2 class="page-title">Users</h2>
                    <p>Summary of your users.</p>
                    <div class="row card">
                        
                        <div class="card tab-container">
                            <div class="card-body borderd-tabs">
                                

                            <table class="table m-b-0">
                                                  <thead>
                                                      <tr>
                                                       
                                                          <th scope="col">User</th>
                                                          <th scope="col">Contact</th>
                                                          <th scope="col">Country</th>
                                                          
                                                          <th scope="col">Date</th>
                                                          <th scope="col">Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="display-box">


                                                         
                                                  @foreach($users as $user)	
                                                  
                                                          
													
                                                             <tr>
                                                            
                                                             
                                                            
                                                            <td>      <img src="/gallery/{{$user->photo}}"  style="width:60px; height:60px;">  
    <a href="/admin/user/{{$user->username}}"> {{$user->name}}  <br><strong> {{$user->username}}  </strong></a>  

                                                            </td>
                                                            <td>
                                                            {{$user->email}} <br>
                                                            {{$user->phone}}
                                                            
                                                            </td>
                                                            
                                                            
                                                            <td> 
                                                                    {{$user->country}}
                                                            
                                                            <td> <i> {{get_date($user->updated_at)}}  </i>   </td>
                                                            
                                                            <td>
                                                            <div class="dropdown">
                                                    <i class="fa fa-ellipsis-v dropdown-togglee" data-toggle="dropdown" style="cursor:pointer;"></i>

 <!-- <button class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>-->
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/admin/user/{{$user->id}}"><i class="fa fa-pen"></i> Edit</a>
    <a class="dropdown-item" href="/admin/user/delete/{{$user->id}}"><i class="fa fa-trash"></i> delete</a> 
  </div>
                                     
                                                             
                                                            </td>
                                                            </tr>   
                                                                
                                                                     
                                                                   

                                                                
                                                                                                                     
                                                                    





                                                    @endforeach

                                                    </tbody>
                                              </table>
                               
                                 
          
           
 
     


            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  -->

            <!-- Pending Requests Card Example -->
            
          </div>

         
                </div>

                
            </div>


      

         
        </div>

    </div>



            <!-- end main content-->
            @stop