@extends('layout.master')

@section('title', 'Join Room')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                   
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
                                        Join Room
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                                </div>

                                <div class="row" style="padding:10px;"> 
                                
                                      
                                        <div class="col-sm-7"> 
                                        <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                        <form action="/join/go" method="post">
                                        @csrf
                                        @if(isset($Error_Message))
                                            <div class="alert alert-danger">
                                                        {{$Error_Message}}
                                            </div>
                                        @endif
                                            <div class="form-row">
                                                <div class="col-lg-12 m-b-30">
                                                    <h2>Enter Transaction ID </h2>
                                         <input type="text" name="id" id="id" placeholder="Transaction Id is required to proceed" class="form-control" oninput="assetGo()">
                                               
                                          </div>
                      
                                               
                         

                                          <button class="btn btn-success" type="submit">  Join</button>

                                                </div>
                       
                                              
                                       
                                              <br>
           
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
            </div>
        </div>
 
            
        <script>
          
        </script>
            <!-- end main content-->
            @stop