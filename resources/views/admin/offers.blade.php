@extends('admin.layout.master')

@section('title', 'Trades')

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
                                                <th scope="col">Available</th>
                                                <th scope="col">Accepting</th>
                                                <th scope="col">Rate</th>
                                                <th scope="col">Amount Available</th>
                                                <th scope="col">User</th> 
                                                <th scope="col">Last Updated</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)

                                                <tr>
                                                    <td>
                                                        {{$offer->asset_data->title}}
                                                    </td>
                                                    <td>{{$offer->asset_two_data->title}}</td>
                                                    <td>
                                                             {{$offer->rate}}
                                                    </td>
                                                    <td>
                                                    {{$offer->available}}
                                                    </td> 
                                                    <td>
                                                    {{$offer->user}}
                                                    </td>
                                                    <td class="last-trade">
                                                            {{get_date($offer->updated_at)}}
                                                    </td><td class="last-trade">
                                                    <div class="dropdown">
                                                    <i class="fas fa-ellipsis-v dropdown-togglee" data-toggle="dropdown" style="cursor:pointer;"></i>

 <!-- <button class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>-->
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/admin/offer/delete/{{$offer->id}}"><i class="fas fa-trash"></i> Trash</a> 
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