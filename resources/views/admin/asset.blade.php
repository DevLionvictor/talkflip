@extends('admin.layout.master')

@section('title', 'Asset Details')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Asset</h2>
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
                                      Asset Details
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                    @if(isset($asset))
                                        <form action="/admin/asset/save" method="post">
                                        @csrf
                                            <div class="form-row">
                                            <input type="hidden" name="id" value="{{$asset->id}}">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Title  </label>
                                                                <input type="text" name="title" value="{{$asset->title}}" placeholder="Asset Title" class="form-control">
                                                    
                                                                <label>Wallet Address </label>
                                        <input type="text" name="address" placeholder="" value="{{$asset->wallet}}" class="form-control">
                                          
                                        
                                                     </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Short Code </label>
                                        <input type="text" name="short" placeholder="Example BTC, ALT, ETH" value="{{$asset->short}}" class="form-control">
                                     
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Description</label>
                                                            <textarea name="description" class="form-control"> {{$asset->description}}

                                                            </textarea>
                                      
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                              <label>Additional Instructions </label><br>
                                                              <hint>Tell the user how to make payments, Include addresses and wallets where required.  </hint>
                                                             <textarea name="instruction" class="form-control">{{$asset->instruction}}

                                                            </textarea> 
                                                                             </div>
                                              
                                         <hr>
                                              <br>
                                        <button class="btn btn-success" type="submit">  Save Asset </button>

                                            </div>
                                        </form>
                                       @else
                                       <form action="/admin/asset/save" method="post">
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-lg-6 m-b-30">
                                                <label>Title  </label>
                                                                <input type="text" name="title" placeholder="Asset Title" class="form-control">
                                                     </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Short Code </label>
                                        <input type="text" name="short" placeholder="Example BTC, ALT, ETH" class="form-control">
                                          
                                        
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                <label>Description</label>
                                                            <textarea name="description" class="form-control">

                                                            </textarea>
                                      
                                                </div>
                                                <div class="col-lg-6 m-b-30">
                                                              <label> Instructions </label><br>
                                                              <hint>Tell the user how to make payments, Include addresses and wallets where required.  </hint>
                                                             <textarea name="instruction" class="form-control">

                                                            </textarea> 
                                                                             </div>
                                              
                                         <hr>
                                              <br>
                                        <button class="btn btn-success" type="submit">  Save Asset </button>

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