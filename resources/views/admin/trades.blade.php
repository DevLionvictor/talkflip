@extends('admin.layout.master')

@section('title', 'Assets')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid">
         <div class="row m-t-25 justify-content-between">
            <div class="col-lg-12">
         
                        <div class="accordion table-data">
                       
                            <div class="card rounded-0">
                            
                                <div class="card-header">
                                
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#table-two" aria-expanded="true" aria-controls="table-two">
                                        Trades
                                         </span>
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                              </div>
                                <div id="table-two" class="collapse show table-responsive">
                                    <table class="table m-b-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">amount 1</th>
                                                <th scope="col">Amount 2</th>
                                                <th scope="col">Rate</th>
                                                 
                                                <th scope="col">Status</th>
                                                <th scope="col">Last Updated</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($trades as $trade)

                                                <tr>
                                                    <td>
                                                        {{$trade->trader_pays}}
                                                        {{$trade->asset_data->short}}
                                                    </td>
                                                    <td>
                                                    {{$trade->reciever_pays}}
                                                    {{$trade->asset_two_data->short}}
                                                    </td>
                                                    <td>
                                                             {{$trade->rate}}
                                                    </td>
                                                    <td>
                                                            @if($trade->status==0)
                                                                Waiting for trader to accept trade
                                                            @elseif($trade->status==1)
                                                                Trade accepted waiting for user to send asset 
                                                            @elseif($trade->status==2)
                                                                User asset confirm. Waiting for trader to release asset.
                                                            @elseif($trade->status==3)
                                                                Exchange confirmed. open trade to disburse assets.
                                                           @ else
                                                                Precessed
                                                            @endif
                                                            
                                                    </td>
                                                    <td class="last-trade">
                                                    {{get_date($trade->updated_at)}}
                                                    </td><td class="last-trade">
                                                                <a href="/admin/trade/{{$trade->id}}"> <button class="btn btn-success">  open Trade  </button>  </a> 
  </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                             
                                            
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        

            <!-- end main content-->
            @stop