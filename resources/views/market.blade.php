@extends('layout.master')

@section('title', 'Market')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid"> 

                <div class="card" style="padding-left:30px;">

                <div class="card-header">

                            <h3>Market </h3>

                </div>

            @foreach($offers as $offer)
                <div class="item card">
                        <div class="row">
                            <div class="col-sm-3">
                                <p> {{number_format($offer->available,2)}}{{$offer->asset_data->short}} Available </p>
                            </div> <div class="col-sm-3">
                                <p>Accepting {{$offer->asset_two_data->title}}  </p>
                            </div> <div class="col-sm-3">
                                <p>Rate:{{$offer->rate}}{{$offer->asset_two_data->short}}/{{$offer->asset_data->short}}</p>
                                <div> By   <b><span class="text-primary">  {{$offer->user}}  </span></b> <span class="fa fa-clock"> </span>{{get_date($offer->updated_at)}}  </div>
                            </div> <div class="col-sm-3">
                               <a href="/trade/create/{{$offer->id}}"> <button class="btn btn-info">Trade </button>   </a>
                            </div>
                        </div>
                        
                        <hr>
                    </div> 

            @endforeach
                        
                     

                </div>
        </div>

    </div>

            <!-- end main content-->
            @stop