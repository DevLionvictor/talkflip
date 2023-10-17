@extends('layout.master')

@section('title', 'Deposit')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-6">
                    <h2 class="page-title">Deposit</h2>
              
                   
                </div>

                 
            </div>

            <div class="row m-t-25">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form card" action="deposit/save" method="post">
                @csrf
                    <h3>Enter Deposit details </h3>
                    

                    <label>Currency </label>
                    <select name="asset" class="form-control">
                        @foreach($assets as $asset)
                         <option value="{{$asset->id}}">{{$asset->short }}</option>
                        @endforeach
                        
                    </select>
                    <label> Amount </label>
                    <input type="number" name="amount" class="form-control">

                    <button class="btn btn-info"> Continue </button>
                    






                    </form> 
                    </div>  
                    <br>
                    <br>
                    <br>
<hr />

                    <div class="col-sm-12">

                            <div class="card rounded-0">
                            <div class="card-header"> 
                <h3>Pending Deposits </h3>
                            
                            <div class="collapse show table-responsive" style="width:100%;  " >
                            <table class="table m-b-0  table-striped  " style="width:100% !important;">
                    <tbody>
                                                        @foreach($pending as $deposit)
                                                            <tr>
                                                                <td>  {{$deposit->asset_data->title}} </td>
                                                                <td>  {{$deposit->amount}} {{$deposit->asset_data->short}}</td>
                                                                <td>  {{get_date($deposit->created_at)}} </td>
                                                                <td> <a href="/pay/{{$deposit->id}}" class="btn btn-info">
                                                                  Pay </a> 
                                                                  <a href="/deposit/cancel/{{$deposit->id}}"> Cancel    </a></td>
                                                            </tr>
                                                            @endforeach

                                                            </tbody>

                            </table>
                            </div>

                            </div>
                    </div>  
               
                
                
            </div>
 

                 
                            </div>
        </div>

    </div>

            <!-- end main content-->
            @stop