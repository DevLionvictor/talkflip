@extends('layout.master')

@section('title', 'Offer Details')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Offer</h2>
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
                                        Offer Details
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                    
                                   <div class="container">
                                            <div class="row">
                                            <div class="col-sm-7">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Available Asset  </label>
                                        <h3> {{$offer->asset_data->title}} </h3>
                                        
                                        </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Available Asset  </label>
                                        <h3> {{$offer->asset_two_data->title}} </h3>
                                        </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Rate </label>
                                       
                                                <h3> {{number_format($offer->rate,2)}}{{ $offer->asset_two_data->short}}  </h3>
                                      
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Available Amount[in Selected Asset] </label>
                                                <h3> {{number_format($offer->available,2)}}{{ $offer->asset_data->short}}   </h3>
                                                </div>
                                               
                                         <hr>
                                              <br>
                                        <button class="btn btn-success">  Create Trade </button>

                                        </div>


                                        </div class="col-sm-5">
            <h2>Trader Details </h2>
            <img src="/gallery/{{ $offer->user_data->photo}}" style="width:150px; border-radius:100%;">
            <label> {{ $offer->user_data->name}}  </label>
            <h3>   <label> {{ $offer->user_data->username}}  </label>  </h3>

                                        </div>
                                        </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                             <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#basic-form" aria-expanded="true" aria-controls="basic-form">
                                        Add new Offer
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                        <form action="saveoffer" method="post">
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Available Asset  </label>
                                        <select name="asset" class="form-control">
                                                @foreach($assets as $asset)
                                                    <option value="{{$asset->id}}">{{$asset->title}}</option>
                                                   
                                                @endforeach
                                        </select>  </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Asset Accepted  </label>
                                        <select name="asset_two" class="form-control">
                                            @foreach($assets as $asset)
                                                    <option value="{{$asset->id}}">{{$asset->title}}</option>
                                                   
                                                @endforeach
                                        </select>
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Rate </label>
                                        <input type="number" name="rate" class="form-control">

                                      
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Available Amount[in Selected Asset] </label>
                                        <input type="number" name="available" class="form-control">

                                                </div>
                                               <p> 
                                        <input type="radio" name="public" value="1"> Public  
                                        <input type="radio" name="public" value="0"> Private  
                                         </p>
                                         <hr>
                                              <br>
                                        <button class="btn btn-success" type="submit">  Create Offer </button>

                                            </div>
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