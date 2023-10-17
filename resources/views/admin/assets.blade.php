@extends('admin.layout.master')

@section('title', 'Assets')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid">
         <div class="row m-t-25 justify-content-between">
            <div class="col-lg-12">
            <span style=" "> <a href="/admin/asset/new"><button class="btn btn-info"> Add New  </button>   </a> </span>
               
                           
         
                        <div class="accordion table-data">
                       
                            <div class="card rounded-0">
                            
                                <div class="card-header">
                                
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#table-two" aria-expanded="true" aria-controls="table-two">
                                        Assets
                                         </span>
                                        <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                    </h4>
                              </div>
                                <div id="table-two" class="collapse show table-responsive">
                                    <table class="table m-b-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID Number</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Short Code</th>
                                                <th scope="col">Instructions</th>
                                                <th scope="col">Last Updated</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($assets as $asset)

                                                <tr>
                                                    <td>
                                                        {{$asset->id}}
                                                    </td>
                                                    <td>{{$asset->title}}</td>
                                                    <td>
                                                             {{$asset->short}}
                                                    </td>
                                                    <td>
                                                    {{$asset->instructions}}
                                                    </td>
                                                    <td class="last-trade">
                                                    {{get_date($asset->updated_at)}}
                                                    </td><td class="last-trade">
                                                    <div class="dropdown">
                                                    <i class="fas fa-ellipsis-v dropdown-togglee" data-toggle="dropdown" style="cursor:pointer;"></i>

 <!-- <button class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>-->
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/admin/asset/{{$asset->id}}"><i class="fas fa-pen"></i> Edit</a>
    <a class="dropdown-item" href="/admin/asset/delete/{{$asset->id}}"><i class="fas fa-trash"></i> Trash</a> 
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