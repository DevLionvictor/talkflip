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
                    <h2 class="page-title">Debits</h2>
                    <a href="/admin/debit/new" class="btn btn-info" style="float:right"> Debits</a>
                    <p>Summary of your debits.</p>
                      <div class="card tab-container">
                            <div class="card-body borderd 
                                            <div class="col-md-12">
                                             
 
 
                                                 @foreach($debits as $debit)	
                                                  
                                                      
                                                             <div>
                                                            
                                                           
                                                            <h4> <span class="fa fa-user-circle"> <strong>{{$debit->user}}  </strong></span>    </h4>
                                                            <p> 
                                                            <b>Amount: </b> {{ $debit->amount}}   {{$debit->asset_data->short}}<br />
                                                            <b>Source: </b> {{$debit->source}} <br />
                                                             
                                                            Added On:{{get_date($debit->updated_at)}}
                                                           <hr /> </div>
                                       
                                            
  
                                   
                             @endforeach
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