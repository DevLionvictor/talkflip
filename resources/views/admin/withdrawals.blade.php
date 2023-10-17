@extends('admin.layout.master')

@section('title', 'Deposits')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
    <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                    <h2 class="page-title">Withdrawals</h2>
                    <a href="/admin/debit/new" class="btn btn-info" style="float:right">New Debit</a>
                    <p>Summary of Withdrawals.</p>
                      <div class="card tab-container">
                            <div class="card-body borderd-tabs">
                                
                                <ul class="nav nav-pills m-t-30 m-b-30">
                                    <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Pending</a>
                                    </li>
                                    <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Approved</a>
                                    </li>
                                   <!--  <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Done</a>
                                    </li>
                                   <li class="nav-item"><a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Tab 4</a>
                                    </li> -->
                                </ul>
                                <div class="tab-content br-n pn">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12">
                                             
 
 
                                                 @foreach($withdrawals->pending as $withdrawal)	
                                                  
                                                      
                                                             <div>
                                                            
                                                            <div class="fright" style="float:right"> <a href="/admin/withdrawal/confirm/{{$withdrawal['id']}}"><button class="btn btn-success"> Confirm  </button> </a> </div>
                                                            <h4> <span class="fa fa-user-circle"> <strong>{{$withdrawal->user}}  </strong></span>    </h4>
                                                            <p> 
                                                            <b>Amount: </b> {{ $withdrawal->amount}}   {{$withdrawal->asset_data->short}}<br />
                                                            <b>Instructions: </b> {{$withdrawal->instruction}} <br />
                                                             
                                                            Added On:{{get_date($withdrawal->updated_at)}}
                                                           <hr /> </div>
                                                @endforeach
 
                                            </div>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-12">
                                            
 
                                                @foreach($withdrawals->confirmed as $withdrawal)	
                                                  
                                                      <div>
                                                            
                                                            
                                                      <h4> <span class="fa fa-user-circle"> <strong>{{$withdrawal->user}}  </strong></span>    </h4>
                                                            <p> 
                                                            <b>Amount: </b> {{ $withdrawal->amount}}   {{$withdrawal->asset_data->short}}<br />
                                                            <b>Instruction: </b> {{$withdrawal->instruction}} <br />
                                                             On:{{get_date($withdrawal->updated_at)}} <br>
                                                            Status:Confirmed.
                                                           <hr /> </div> 

                                                  @endforeach


                                                



 
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div id="navpills-4" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quibusdam maxime laudantium voluptate libero saepe, optio explicabo natus consequuntur, dicta repellendus. Quia optio iste aliquam eveniet accusamus beatae pariatur nemo omnis commodi illo consequatur minima veritatis illum aut reiciendis labore necessitatibus accusantium, voluptate sunt voluptatum adipisci aperiam a. Fuga laudantium et dolore at aliquid, accusantium ea illo aspernatur voluptate libero quidem, temporibus assumenda, sapiente commodi perspiciatis autem repellendus consequuntur. Facilis, nemo odio molestias iste quas cum iusto nulla. Dolor, architecto.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>


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

    </div>

   



            <!-- end main content-->
            @stop