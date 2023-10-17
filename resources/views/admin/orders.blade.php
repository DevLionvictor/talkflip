@extends('pro-admin/layout.master')

@section('title', 'Orders')

@section('content') 
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Orders</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                    
                   <!-- <a href="/pro-admin/post">  <button class="btn btn-primary">Add New   </button></a></li>-->
                     
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <!--<h4 class="card-title">Default View</h4>-->
                                
            <div class="row">

            <div class="col-sm-3">
            <label>Select Category </label>
        <select class="form-control">  <option>
            
            Pending
            </option>
            
            <option>
            
            Processed

            </option>
            
            <option>
            All Order
           </option>
            
   
              </select>   </div>
            <div class="col-sm-5">
            <label>Filter Posts </label> <input type="text" class="form-control"  placeholder="Search">  </div>
            <div class="col-sm-4">
                                     <br> <span style="float:right;">  {{ $orders->links() }}  </span>   </div>
            </div>
            <hr>
                                <table id="datatable" class="table table-bordered table-striped dt-responsive  nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Quantity</th>
                                            <th>Property</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Last Updated</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                            <td><b><a href="/pro-admin/order/{{$item->order_id}}"> {{$item->order_id}}  </a> </b></td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->property_details->title}}
                                            
                                            <br>
                                                N{{number_format($item->property_details->price,2)}}| {{$item->property_details->quantity}} Available
                                            </td>
                                            <td>{{$item->name}} <br>
                                            {{$item->email}} <br>
                                            {{$item->phone}} 
                                            </td>
  
                                            <td>{{order_status($item->status)}}</td>
                                            <td>{{get_date($item->updated_at)}}</td>
                                            <td>

                                            <!--
                                            <div>
                                            <div class="d-box"><i class="fas fa-ellipsis-v d-but"  style="position:absolute; "></i>
                                                    <div class="dropdown" style="">
                                                    <item><i class="fas fa-pen"></i> Edit </item>
                                                    <item><i class="fas fa-trash"></i> Trash </item>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    -->
                                                    <div class="dropdown">
                                                    <i class="fas fa-ellipsis-v dropdown-togglee" data-toggle="dropdown" style="cursor:pointer;"></i>

 <!-- <button class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>-->
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
   <a class="dropdown-item" href="/pro-admin/order/delete/{{$item->order_id}}"><i class="fas fa-trash"></i> Trash</a> 
  </div>
</div>
                                            </td>
                                        </tr> 
                                    @endforeach
                                         
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

 

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


      @stop