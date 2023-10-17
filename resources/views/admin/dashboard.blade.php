@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid">
            

            <div class="row m-t-25">
                <div class="col-lg-3">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded bitcoin">
                            <div class="currency-card--icon pull-right">
                               <span style="color:white;"> <span class="fa fa-exchange">   </span>  </span>
                            </div>
                            <h4>Trades</h4>
                            <h2>
                                <span>{{$stats->trades}}</span> 
                            </h2>
                            <p>Active Trades: {{$stats->active_trades}}</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded ethereum">
                            <div class="currency-card--icon pull-right">
                            <span style="color:white;"> <span class="fa fa-gift">   </span>  </span>
                            
                            </div>
                            <h4>Offers</h4>
                            <h2>
                                <span>{{$stats->offers}}</span> 
                            </h2>
                            <p style="visibility:hidden;">Brought Rate: 80%</p>
                             
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded ripple">
                            <div class="currency-card--icon pull-right">
                           
                            <span style="color:white;">  <i class="fa fa-credit-card"></i>  </span>
                            
                            </div>
                            <h4>Assets</h4>
                            <h2>
                                <span>{{$stats->assets}}</span>  
                            </h2>
                            <p style="visibility:hidden;">Brought Rate: 80%</p>
                             
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded litecoin">
                            <div class="currency-card--icon pull-right">
                            <span style="color:white;">  <i class="fa fa-users"></i>  </span>
                            
                            </div>
                            <h4> Users</h4>
                            <h2>
                                <span>{{$stats->users}}</span> 
                            </h2>
                            <p style="visibility:hidden;">Brought Rate: 80%</p>
                             
                        </div>
                    </div>
                </div>
            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

            <!-- end main content-->
            @stop