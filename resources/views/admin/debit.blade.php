@extends('admin.layout.master')

@section('title', 'Deposits')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
    <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12"> <a href="/admin/deposits" class="btn btn-info" style="float:right"> Deposits</a>
                      
                    <h2 class="page-title"> New Deposits</h2>
                   

                      <form class="form" action="/admin/debit/save" method="post">
                      @csrf
                      <label>User </label>
                                <select name="user" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->username}}">{{$user->name}} </option>
                                        @endforeach
                                </select>
                                <label> Asset  </label>
                                <select name="asset" class="form-control">
                                    @foreach($assets as $asset)
                                        <option value="{{$asset->id}}">  {{$asset->short}} </option>
                                    @endforeach
                                </select>
                                <label>  Amount </label>
                                <input type="number" name="amount" class="form-control">
                                   <label>  Source </label>
                                <select name="source" class="form-control">
                                            <option value="trade">Trade    </option>
                                            <option value="deposit">Withdrawal    </option>
                                            <option value="bonus">Penalty    </option>
                                </select>   <br>
                                 <button class="btn btn-info"> Save  </button>

                      </form>
</div>


            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  -->

            <!-- Pending Requests Card Example -->
            
          </div>

         
                </div>

                
            </div>

             </div>
        </div>

    </div>

   



            <!-- end main content-->
            @stop