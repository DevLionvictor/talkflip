@extends('layout.master')

@section('title', 'Payment')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                    <div class="card">
                    <h2 class="page-title">Deposit</h2>
                    <div class="col-sm-12"><div style="float:right;">
                    <span class="alert alert-info"> 
                    @if($deposit->status==0)
                      Pending
                      @else
                      success
                      @endif </span>
                    <a href="/deposit/cancel/{{$deposit->id}}">  Cancel Deposit </a>

                    </div>

                    </div>
                    <hr />
        
 
  <p> <b>Amount:  </b> {{$deposit->amount}} {{$deposit->asset_data->short}} </p>
                    <p> <b>Instructions: </b> {{$deposit->asset_data->instruction}} </p>
   
   
  <form class="form" action="/deposit/proof" method="post" enctype="multipart/form-data">
                            @csrf
                            <label> 
                                Comment
                            </label>
                            <input type="hidden" name="id" value="{{$deposit->id}}">

                            <textarea name="comment" class="form-control"> {{$deposit->comment}}
</textarea>

                            <label>Proof  </label>
                            <br>
                            @if(isset($deposit->proof))
                                    <img src="/gallery/{{$deposit->proof}}">
                                @endif
                                <br>
                            <input type="file" name="proof" class="form-control" required>
                              
                            <button class="btn btn-info"> Update Proof  </button>
                    </form>
  
 
  </div>
</div>
                   
                  
                    </div>
                   
                </div>

                 
            </div>

            <div class="row m-t-25">
            <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                        </div>

                    </div>    
               
                
                
            </div>
 

                 
                            </div>
        </div>

    </div>

            <!-- end main content-->
            @stop