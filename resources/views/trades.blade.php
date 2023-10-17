@extends('layout.master')

@section('title', 'My Rooms')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid card"> 

                <div class="card">

                <div class="card-header">

                            <h3>Rooms </h3>

                </div>
            @foreach($active_trades as $trade)

            <a href="/trade/{{$trade->trx_id}}">
            <div class="item card text-info">
                        <div class="row">
                            <div class="col-sm-3">
                                <p> Buyer Amount: {{$trade->buyer_amount}}{{$trade->asset_data->short}} </p>
                            </div> <div class="col-sm-3">
                                <p>Seller Amount:{{$trade->seller_amount}}{{$trade->asset_data->short}}    </p>
                            </div> <div class="col-sm-3">
                                <p>Role:
                                    @if($trade->buyer == $user->username)
                                        Buyer
                                    @else
                                        Seller
                                    @endif
                                </p> 
                            </div> 
                            <div class="col-sm-3">
                                    Last Updated: {{get_date($trade->updated_at)}}
                            </div> 
                        </div>
                        <hr>
                    </div>  </a>
                    @endforeach
                      
                    

                </div>



            <br>
         
           

              <!--  <div class="card">

                <div class="card-header">

                            <h3>Trade History </h3>

                </div>


                    <div class="item card">
                        <div class="row">
                            <div class="col-sm-3">
                                <p> Recieving 12,000BTC </p>
                            </div> <div class="col-sm-3">
                                <p>Sending 12,000BTC </p>
                            </div> <div class="col-sm-3">
                                <p>Rate</p>
                            </div> <div class="col-sm-3">
                                <p>pending</p>
                            </div>
                        </div>
                        <hr>
                    </div>     
                     <div class="item card">
                        <div class="row">
                            <div class="col-sm-3">
                                <h4> Buying 12,000BTC </h4>
                            </div> <div class="col-sm-3">
                                <h4>Paying 12,000BTC </h4>
                            </div> <div class="col-sm-3">
                                <h4>12,000BTC </h4>
                            </div> <div class="col-sm-3">
                                <h4>pending</h4>
                            </div>
                        </div>
                        <hr>
                    </div>

                </div>-->
        </div>

    </div>

            <!-- end main content-->
            @stop