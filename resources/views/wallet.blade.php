@extends('layout.master')

@section('title', 'Wallet')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-6">
                    <h2 class="page-title">Wallet</h2>
              
                   
                </div>

                 
            </div>

            <div class="row m-t-25">
                @if(isset($mywallets))
            @foreach($mywallets as $wallet)
            <div class="col-lg-4 col-md-6">
                        <div class="accordion accordion__walet">
                            <div class="card walet-info-card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#{{$wallet->asset_data->title}}" aria-expanded="true" aria-controls="walet-info-one">
                                       {{$wallet->asset_data->title}}
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div id="{{$wallet->asset_data->title}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="walet-title">
                                            <i class="cc BTC currency-card--icon pull-left" title="BTC"></i>
                                            <h6>
                                                {{$wallet->asset_data->title}}
                                            </h6>
                                            <p> {{$wallet->balance}}  {{$wallet->asset_data->short}}</p>
                                        </div>
                                        <div class="walet-details">
                                           
                                            <div class="walet-status">
                                                
                                                <button class="btn btn-success btn-block m-t-30" data-toggle="modal" data-target="#myModal">Withdraw</button>
                                            </div>
                                            <br>
                                            <a class="btn btn-info btn-block" href="/deposit"> Add Coins </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    @endforeach   

                    @else


                    @endif
               
                
                
            </div>
 

                 
                            </div>
        </div>

    </div>

    

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="align-items:left;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">WITHDRAW</h4>
        </div>
        <div class="modal-body">
        

            @if(active_withrawal())

               <center>You have a pending withdrawal. Please hold as it is processed<br>
                            <br><a href="/withdrawals"> <button class="btn btn-success"> View Withdrawals   </button> </a>
               </center>  
            

            @else


                
                <div class="withdraw" id="withdrawal-box">
        <center> 
        
         </center>
         <form action="wallet/withdraw" method="post">      
         @csrf
         <label>Asset </label>
         <select name="asset" class="form-control">
                @foreach($wallets as $asset)
                    <option value="{{$asset->id}}">  {{$asset->short}} </option>
                    @endforeach
         </select>
        <label> Amount[USD] </label>
        <input type="number" name="amount" id="i-amount" class="form-control"  step="any" required />
        <label> Recieve details[wallet address etc] </label>
                        <textarea name="instruction" class="form-control">    </textarea>
        <br>
        <p id="error-box">   </p>
        <button class="btn btn-danger">WITHDRAW </button>
         </form>
        
        </div>

    @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
            <!-- end main content-->
            @stop