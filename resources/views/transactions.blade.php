@extends('layout.master')

@section('title', 'Transactions')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid"> 

                <div class="card" style="padding-left:30px;">

                <div class="card-header">

                            <h3>Transactions</h3>

                </div>
                <h2>Deposits </h2>
        <table class="table table-striped">
        <tr>

        <th>Asset </th>
        <th>Amount </th>
        <th>Details</th>
        <th>status </th>
        <th>last updated </th>

        </tr>
            @foreach($deposits as $deposit)
                <tr>

            <td>{{$deposit->asset_data->title}}</td>
            <td>{{number_format($deposit->amount,5)}}{{$deposit->asset_data->short}}</td>
            <td>{{$deposit->source}}</td>
            <td>
                @if($deposit->status==1)
                        <span class="text-info"><span class="fa fa-check"> </span>Approved </span>
                @else
                <span class="text-succes"> Pending </span>
                @endif
               
            
            </td>
            <td>{{get_date($deposit->updated_at)}}</td>
                </tr>

            @endforeach
                        
                     </table>

                <h2>Debits</h2>
        <table class="table table-striped" style="overflow:scroll">
        <tr>

        <th>Asset </th>
        <th>Amount </th>
        <th>Details </th>
        <th>status </th>
        <th>last updated </th>

        </tr>
            @foreach($debits as $debit)
                <tr>

            <td>{{$debit->asset_data->title}}</td>
            <td>{{number_format($debit->amount,5)}}{{$debit->asset_data->short}}</td>
            <td>{{$debit->source}}</td>
            <td>
                @if($debit->status==1)
                        <span class="text-info"><span class="fa fa-check"> </span>Approved </span>
                @else
                <span class="text-succes"> Pending </span>
                @endif
               
            
            </td>
            <td>{{get_date($debit->updated_at)}}</td>
                </tr>

            @endforeach
                        
                     </table>

                </div>
        </div>

    </div>

            <!-- end main content-->
            @stop