@extends('layout.master')

@section('title', 'Offer')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Offer <a href="/newoffer"> <button class="btn btn-info"  style="float:right">  New Offer </button> </a></h2>  
                   
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
                                    @if(isset($offer))
                                        <form action="/saveoffer" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$offer->id}}">
                                            <div class="form-row">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Available Asset  </label>
                                        <select name="asset" class="form-control">
                                                @foreach($assets as $asset)
                                                    <option value="{{$asset->id}}" {{$offer->asset = $asset->id ? 'selected' : ''}}>{{$asset->title}}</option>
                                                   
                                                @endforeach
                                        </select>  </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Asset Accepted  </label>
                                        <select name="asset_two" class="form-control" {{$offer->asset_two = $asset->id ? 'selected' : ''}}>
                                            @foreach($assets as $asset)
                                                    <option value="{{$asset->id}}">{{$asset->title}}</option>
                                                   
                                                @endforeach
                                        </select>
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Rate </label>
                                        <input type="number" name="rate" value="{{$offer->rate}}" class="form-control">

                                      
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label> Available Amount[in Selected Asset] </label>
                                        <input type="number" name="available" value="{{$offer->available}}" class="form-control">

                                                </div>
                                   
                                         <hr>
                                              <br>
                                        <button class="btn btn-success" type="submit">  Save Offer </button>

                                            </div>
                                        </form>
                                        @else

                                        <form action="saveoffer" method="post">
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Available Asset  </label>
                                        <select name="asset" class="form-control" id="availAsset" oninput="avail()">
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
                                        <input type="number" name="available" id="availAmount" class="form-control">

                                                </div>
                                              
                                         <hr>
                                            

                                              <div id="outscreen">   </div>   <br>
                                              <hr>
                                        <button class="btn btn-success" id="availBut" type="submit">  Create Offer </button>

                                            </div>
                                        </form>


                                        @endif
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