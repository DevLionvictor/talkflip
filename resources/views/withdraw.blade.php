@extends('layout.master')

@section('title', 'Wallet')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            
    <div class="content-body">
        <div class="container-fluid">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-12">
                    <h2 class="page-title">Withdrawal</h2>
                    <div class="fright">  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> WITHDRAW </button>   </div>
                
                    <div class="row">
                    
                    <div class="col-lg-6">

                    <center>
                               @if(isset($info))
                                <div class="alert alert-info">
                                  {{$info}}

                                </div>
                                @endif


                                </center>
                            </div>
 
                    </div>

                    </div>
                </div>
              


            

           
        </div>

    </div>
    </div>


   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="align-items:left;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">WITHDRAW</h4>
        </div>
        <div class="modal-body">
        

            @if(active_withrawal())

               <center>You have a pending withdrawal. Please hold as it is processed<br>
                            <br><a href="/withdrawals"> <button class="btn btn-success"> View Withdrawals   </button> </a>
               </center>  
            

            @else


                
                <div class="withdraw" id="withdrawal-box">
        <center> 
        
         </center>
         <form action="wallet/withdraw" method="post">      
         @csrf
         <label>Asset </label>
         <select name="asset" class="form-control">
                @foreach($wallets as $asset)
                    <option value="{{$asset->id}}">  {{$asset->short}} </option>
                    @endforeach
         </select>
        <label> Amount[USD] </label>
        <input type="number" name="amount" id="i-amount" class="form-control"  step="any" required />
        <label> Recieve details[wallet address etc] </label>
                        <textarea name="instruction" class="form-control">    </textarea>
        <br>
        <p id="error-box">   </p>
        <button class="btn btn-danger">WITHDRAW </button>
         </form>
        
        </div>

    @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
            <!-- end main content-->
            @stop