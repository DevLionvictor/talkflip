@extends('layout.master')

@section('title', 'New Trade')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Room</h2>
                </div>
            </div>
        </div>
    
        <div class="forms-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion table-data">
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#basic-form" aria-expanded="true" aria-controls="basic-form">
                                        New Trade
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>

                                <div class="row" style="padding:10px;"> 
                                 
                                        <div class="col-sm-7"> 
                                        <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                        <form action="/trade/save" method="post">
                                        @csrf
                                            @if(isset($Error_Message))
                                                    <div class="alert alert-danger">
                                                            {{$Error_Message}}
                                                    </div>
                                            @endif
                        <div class="card-innr">
                            <div class="card-head">
                                
                                <h4 class="card-title">Create Trade</h4>
                            </div>
                            <div class="alert alert-info">
                                <p>
                                    Before you can carry out any transaction, your account must have
                                    been funded to support that trade.
                                </p>
                            </div>
                             

                            <br>

                            <div class="card-head">
                                <span class="card-sub-title text-primary font-mid">Step 1</span>
                                <h4 class="card-title">Select currencies</h4>
                            </div>

                            <br>
                    <label>Select currency 1 </label>
                            <select name="buyer_asset" required="" class="form-control">
                                    @foreach($assets as $asset)

                                        <option value="{{$asset->id}}">{{$asset->title}}</option>
                                        @endforeach
                                                            </select>

                                                            
                            <div class="note note-plane note-secondary note-sm  pl-0">
                                <p class="text-muted">
                                    This is the original cryptocurrency, 
                                This is the buyer Currency</p>
                            </div>

                            <br>
                            <label>Select currency 2 </label>

                            <select name="seller_asset" required="" class="form-control">
                            @foreach($assets as $asset)

<option value="{{$asset->id}}">{{$asset->title}}</option>
@endforeach
                    </select>
                            <div class="note note-plane text-muted note-sm  pl-0">
                                <p class="text-muted"> 
                                    This is the seller Currency
                                    This is the currency that is being exchanged for the original cryptocurrency, 
                                    this can be either a cryptocurrency or a local currency.
                                </p>
                            </div>
                            
                            <br>

                            <div class="card-head">
                                <span class="card-sub-title text-primary font-mid">Step 2</span>
                                <h4 class="card-title">Enter amount 1</h4>
                            </div>

                            

                            <div class="token-contribute">
                            <input value="" type="text" class="form-control" name="buyer_amount" placeholder="Enter amount from buyer" required="">
                                <div class="note note-plane text-muted note-sm  pl-0">
                                    <p class="text-muted">The total amount which the buyer is sending.</p>
                                </div>
                                <br>
                                <input value="" type="text" class="form-control" name="seller_amount" placeholder="Enter amount from seller" required="">
                                <div class="note note-plane text-muted note-sm  pl-0">
                                    <p class="text-muted">The total amount which the seller is sending.</p>
                                </div>
                                
                               

                               
                                
                                <br>

                                <select name="role" required="" class="form-control">
                                    <option value="">Select your role</option>
                                    <option value="seller">I am Selling</option>
                                    <option value="buyer">I am Buying</option>
                                </select>
                                                                
                                

                                
                                
                                
                                <br>
                                <br>
                                
                                <div class="token-calc-note note note-plane">
                                    <em class="fa fa-times-circle text-success" aria-hidden="true"></em>
                                    <span class="note-text text-info">
                                        Escrow Fee: 10.00% of transaction
                                    </span>
                                </div>
                            </div>
                            
                            <div class="pay-buttons">
                                <div class="pay-button">
                                    <button type="submit" class="btn btn-info w-100">
                                        Proceed to Trading Room <em class="ti ti-arrow-right"></em>
                                    </button>
                                </div>
                            </div>
                            
                        </div> <!-- .card-innr -->
                    </form>
                                            
                                    </div>
                                </div>
                                        
                                          </div>
                                
                                </div>


                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
            
        <script>
          
        </script>
            <!-- end main content-->
            @stop