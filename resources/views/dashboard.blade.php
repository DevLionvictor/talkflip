@extends('layout.master')

@section('title', 'Dashboard')

@section('content') 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           
            <div class="content-body">
        <div class="container-fluid card">
            <div class="row m-t-25 justify-content-between">
                <div class="col-lg-6">
                    <h2 class="page-title">Your Dashboard</h2>
              
                   
                </div>

               
            </div>

            <div class="row m-t-25">
            <div class="col-lg-12">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded ethereum">
                            <div class="currency-card--icon pull-right">
                              
                            </div>
                            <h4>Wallets</h4>
                            <div class="row">
                                @if(isset($wallets))

                            @foreach($wallets as $wallet)
                            <div class="col-xs-4 col-sm-6">
                    <h2>
                                <span>{{$wallet->balance}}</span> 
                             
                                
                            </h2>
                            <span class="text-info"> {{$wallet->asset_data->short}}</span>
                            <hr>

                       
                    </div>

                    @endforeach
                    @else    <div class="col-xs-4 col-sm-6">
                    <h2>
                            <span>0.00</span> 
                            </h2>

                        </div>
                            @endif
   

                            </div>
                           
                            
                            
                        </div>
                    </div>
                </div>
</div>
            <div class="row m-t-25">
                <div class="col-lg-4">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded bg-dark">
                            <div class="currency-card--icon pull-right">
                                <!--<i class="cc BTC-alt" title="BTC"></i>-->
                            </div>
                            <h4>Active Trades</h4>
                            <h2>
                                <span>{{$stats->active_trades}}</span>  
                            </h2>
                           
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded bg-success">
                            <div class="currency-card--icon pull-right">
                                <!--<i class="cc BTC-alt" title="BTC"></i>-->
                            </div>
                            <h4>Completed Trades</h4>
                            <h2>
                                <span>{{$stats->done_trades}}</span>  
                            </h2>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card currency-card-rounded">
                        <div class="card-body rounded bg-info">
                            <div class="currency-card--icon pull-right">
                                <!--<i class="cc BTC-alt" title="BTC"></i>-->
                            </div>
                            <h4>Total Trades</h4>
                            <h2>
                                <span>{{$stats->trades}}</span>  
                            </h2>
                             
                             
                        </div>
                    </div>
                </div>
                
                
                
            </div>

            <div class="row m-t-25">
                
                <div class="col-lg-12">
                    <div class="accordion table-data">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h4 class="mb-0" data-toggle="collapse" data-target="#balance-chart" aria-expanded="true" aria-controls="table-one">
                                    Marketcap
                                    <i class="fa pull-right accordion__angle--animated" aria-hidden="true"></i>
                                </h4>
                            </div>
                            <div class="tradingview-widget-container" style="width: 100%; height: 490px;">
                            <iframe allowtransparency="true" style="box-sizing: border-box; height: 490px; width: 100%;" src="https://www.tradingview-widget.com/embed-widget/crypto-mkt-screener/?locale=en#%7B%22width%22%3A%22100%25%22%2C%22height%22%3A490%2C%22defaultColumn%22%3A%22overview%22%2C%22screener_type%22%3A%22crypto_mkt%22%2C%22displayCurrency%22%3A%22USD%22%2C%22colorTheme%22%3A%22light%22%2C%22market%22%3A%22crypto%22%2C%22enableScrolling%22%3Atrue%2C%22utm_source%22%3A%22www.ficonexchange.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22cryptomktscreener%22%7D" frameborder="0"></iframe>
                            
                        <style>
	.tradingview-widget-copyright {
		font-size: 13px !important;
		line-height: 32px !important;
		text-align: center !important;
		vertical-align: middle !important;
		font-family: 'Trebuchet MS', Arial, sans-serif !important;
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright .blue-text {
		color: #2962FF !important;
	}

	.tradingview-widget-copyright a {
		text-decoration: none !important;
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright a:visited {
		color: #9db2bd !important;
	}

	.tradingview-widget-copyright a:hover .blue-text {
		color: #1E53E5 !important;
	}

	.tradingview-widget-copyright a:active .blue-text {
		color: #1848CC !important;
	}

	.tradingview-widget-copyright a:visited .blue-text {
		color: #2962FF !important;
	}
	</style></div>
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