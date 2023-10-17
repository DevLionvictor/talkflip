@extends('layout.master')

@section('title', 'Trade')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Trade Details</h2>
                </div>
            </div>
        </div>
    
        <div class="forms-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion table-data">
                           
                                <div class="alert alert-danger">
                                            {{session('error')}}
                                </div>

                               
                        @if($trade->buyer == $user->username)
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#basic-form" aria-expanded="true" aria-controls="basic-form">
                                        Active  Room
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>

                                <div class="row" style="padding:10px;"> 
                                
                                        <div class="col-sm-5"> 
                                                    <h5> Room ID {{$trade->trx_id}} </h5>
                                                   <a href="/trade/pay/{{$trade->trx_id}}"> <button class="btn btn-info w-100">Pay  </button></a>
                                                    <p>Recieving: <b>  {{$trade->seller_amount}}{{$trade->asset_two_data->short}}  </b>   </p>

                                                    <p>Escrow Amount: <b>  {{0.1*$trade->buyer_amount}}{{$trade->asset_data->short}}   </b>   </p>
                                                    <p>Total amount payable: <b>  {{$trade->buyer_amount+(0.1*$trade->buyer_amount)}}{{$trade->asset_data->short}}   </b>   </p>
                                                    <p>Coin Sending: <b> {{$trade->asset_data->title}}   </b>   </p>
                                                    <p>Coin Recieving: <b>  {{$trade->asset_two_data->title}}    </b>   </p>
                                                    <p>Role:

                                    @if($trade->buyer == $user->username)
                                        Buyer
                                    @else
                                        Seller
                                    @endif
                                </p> 
                                                     <p>Owner: <b> {{ $trade->user}}    </b>   </p>
                                                    <div>  
                                                    <p>  Buyer Status:
                                        @if($trade->buyer_status==0)
                                            Waiting
                                        @else   Confirmed
                                        @endif
                             </p>
                             
                              <p>  Seller Status:
                                        @if($trade->seller_status==0)
                                            Waiting
                                            @else

                                                Confirmed
                                        @endif

                             </p>

                                                                <hr>
                                                             @if($trade->user==$user->username)
                                                                <button class="btn btn-danger">
                                                                            Close Room
                                                                </button>
                                                            @endif
                                                           <a href="/"> <button class="btn btn-warning">
                                                                            Leave Room
                                                                </button> </a>
                       
                                          </div>
                                        <div class="col-sm-7"> 
                                        <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                      
  
                                </div>
                                        
                                          </div>
                                
                                </div>


                               
                            </div>
                        </div>

                    @elseif($trade->seller=$user->username)


                    <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#basic-form" aria-expanded="true" aria-controls="basic-form">
                                        Active  Room
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>

                                <div class="row" style="padding:10px;"> 
                                
                                        <div class="col-sm-5"> 
                                        <h5> Room ID {{$trade->trx_id}} </h5>
                                        <a href="/trade/pay/{{$trade->trx_id}}">  <button class="btn btn-info w-100">Pay  </button> </a>
                                                    <p>Recieving: <b>  {{$trade->buyer_amount}}{{$trade->asset_data->short}}  </b>   </p>

                                                    <p>Escrow Amount: <b>  {{0.1*$trade->seller_amount}}{{$trade->asset_two_data->short}}   </b>   </p>
                                                    <p>Total amount payable: <b>  {{$trade->seller_amount+(0.1*$trade->seller_amount)}}{{$trade->asset_two_data->short}}   </b>   </p>
                                                    <p>Coin Sending: <b> {{$trade->asset_two_data->title}}   </b>   </p>
                                                    <p>Coin Recieving: <b>  {{$trade->asset_data->title}}    </b>   </p>
                                                    <p>Role:
                                    @if($trade->buyer == $user->username)
                                        Buyer
                                    @else
                                        Seller
                                    @endif
                                </p> 
                                                     <p>Owner: <b> {{ $trade->user}}    </b>   </p>
                                                    <div>  
                                                    <p>  Buyer Status:
                                        @if($trade->buyer_status==0)
                                            Waiting
                                        @else   Confirmed
                                        @endif
                             </p>
                             
                              <p>  Seller Status:
                                        @if($trade->seller_status==0)
                                            Waiting
                                            @else

                                                Confirmed
                                        @endif

                             </p>
                                                                <hr>
                                                                @if($trade->user==$user->username)
                                                                <button class="btn btn-danger">
                                                                            Close Room
                                                                </button>
                                                            @endif
                                                           <a href="/"> <button class="btn btn-warning">
                                                                            Leave Room
                                                                </button> </a>

                                                                
                                                              </div>

                                          </div>
                                        <div class="col-sm-7"> 
                                        <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                                                          </div>
                                </div>
                                        
                                          </div>
                                
                                </div>


                               
                            </div>
                        </div>

                    @endif


                    </div>
                </div>
            </div>
        </div>
 
            
        <script>
          
        </script>
            <!-- end main content-->
            @stop