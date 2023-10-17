@extends('admin.layout.master')

@section('title', 'Trade Details')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Trade</h2>
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
                                      Trade Details
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                             
                                       <div class="row">
                                <div class="col-sm-6">
                                <h5> Trade Details </h5>
                                                    <p>Trader:{{$trade->trader}}<br> <b> Amount to be paid </b> {{$trade->trader_pays}}{{$trade->asset_data->short}}   </p>
                                                    <p>User:{{$trade->reciever}}<br>
                                                     <b> Amount to be paid {{$trade->reciever_pays}}{{$trade->asset_two_data->short}}     </b>   </p>
                                                    <p>Rate :<b>  {{$trade->rate}}{{$trade->asset_two_data->short}}/{{$trade->asset_data->short}}    </b>   </p>
                                                    <p>Trader: <b> {{ $trade->reciever}}    </b>   </p>
                                               
                                                        <div class="card container">
                                                                        <div class="card-header">
                                                                                    <h3>Trader Proof </h3>
                                                                        </div>
                                                                        <label> Hash  </label>
                                                                        {{$trade->trader_hash }}
                                                                        <img src="/gallery/{{$trade->trader_proof}}" style="width:100px">


                                                        </div>
                                </div> 
                                
                                <div class="col-sm-6">
                                                 
                                <div class="card container">
                                                                        <div class="card-header">
                                                                                    <h3>User Proof </h3>
                                                                        </div>
                                                                        <label> Hash  </label>
                                                                       <p> {{$trade->reciever_hash }}</p>
                                                                        <img src="/gallery/{{$trade->reciever_proof}}" style="width:100px">


                                                        </div>

                                                        <form action="/admin/trade/status/save" method="post">
                                                        @csrf
                <h3>Trade Status  </h3>
                @if($trade->status==0)
                        <div class="alert alert-info">
                                Awaiting Trader to accept trade
                        </div>
                @elseif($trade->status==1)
                <div class="alert alert-info">
                Trade Accepted Awaiting user to send Assets 
                        </div>
                @elseif($trade->status==2)
                <div class="alert alert-info">
                User Asset confirmed Awainting trader to release assets
                        </div>
                @elseif($trade->status==3)
                <div class="alert alert-info">
                Trader Assets confirmed.
                        </div>
                @else
                <div class="alert alert-info">
                            
                            Trade Processed                        </div>
                @endif

            <input type="hidden" name="trade" value="{{$trade->id}}">
                <select name="status" class="form-control">
                            <option value="0" {{$trade->status = 0? '' : 'selected'}}> Awaiting Trader to accept trade </option>
                            <option value="1" {{$trade->status = 1? '' : 'selected'}}> Trade Accepted Awaiting user to send Assets </option>
                            <option value="2" {{$trade->status = 2? '' : 'selected'}}>User Asset confirmed Awainting trader to release assets </option>
                            <option value="3" {{$trade->status = 3? '' : 'selected'}}>Trader Assets confirmed.  </option>
                            <option value="4" {{$trade->status = 4? '' : 'selected'}}>Trade Processed </option>

                </select>
                <br>
                <button class="btn btn-info">  Update Status </button>

                </form>

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