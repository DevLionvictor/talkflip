@extends('layout.master')

@section('title', 'Top Offers')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid">
            <div class="row m-t-25 justify-content-between">
               

               <div class="card" style="width:100%;">

           

            <div class="row m-t-25" style="width:100%;">
                <div class="col-lg-12">
                    <div class="accordion table-data">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h4 class="mb-0" data-toggle="collapse" data-target="#table-one" aria-expanded="true" aria-controls="table-one">
                                   My Offers
                                    <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                </h4>
                            </div>
                   
                            <div id="table-one" class="collapse show">
                                <div class="container">
                            @foreach($offers as $offer)
                <div class="item card">
                        <div class="row">
                            <div class="col-sm-3">
                                <p> {{number_format($offer->available,2)}}{{$offer->asset_data->short}} Available </p>
                            </div> <div class="col-sm-3">
                                <p>Accepting {{$offer->asset_two_data->title}}  </p>
                            </div> <div class="col-sm-3">
                                <p>Rate:{{$offer->rate}}{{$offer->asset_two_data->short}}/{{$offer->asset_data->short}}</p>
                                <div>  <span class="fa fa-clock"> </span>{{get_date($offer->updated_at)}}  </div>
                            </div> <div class="col-sm-3">
                               <a href="/offer/{{$offer->id}}"> <button class="btn btn-info">Edit</button>   </a>
                               <a href="/offer/delete/{{$offer->id}}"> <button class="btn btn-danger">trash</button>   </a>
                            </div>
                        </div>
                        
                        <hr>
                    </div> 

            @endforeach

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