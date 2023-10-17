 
<?php 
         
use App\Admin;
use App\Asset;
use App\Debit;
use App\Deposit;
use App\Withdrawal;
use App\Wallet;


function get_wallets($username){


    
    $deposits=deposit::where('user', '=', $username)->where('status', '=',1)->where('amount', '>', 0)->get();
    
    if($deposits->isEmpty()){
        return false;

    }
    
                        
    function _group_by($array, $key) {
     $return = array();
     foreach($array as $val) {
         $return[$val[$key]][] = $val;
     }
     return $return;
 }
 
 
  
    $new_deposits=_group_by($deposits, 'asset');
    $collection;
    $wallets= [];
   //  array_push($wallets['total'], 60);
   // return $wallets;
    foreach($new_deposits as $deposit){
        global $wallets;
        $total=0;
        foreach($deposit as $item){
            $total+=$item->amount;
        }
        $asset_data=Asset::where('id', '=', $deposit[0]['asset'])->first();
        $deb=debit::where('user', '=', $username)->where('asset','=',$item['asset'])->where('status', '=',1)->sum('amount');
        $balance=$total-$deb;
        $wallets[]=[
            'asset' => $deposit[0]['asset'],
            'deposit' => $total,
            'debits'=> $deb*1,
            'balance' => $balance,
            'asset_data' =>$asset_data]
        ;
        //$wallets[]=['amount' => $total];
       $collection=collect($wallets)->all();
    } 
     $wall=new wallet;
     $wall=$collection;
     foreach($wall as $item){
         $deb=debit::where('user', '=', $username)->where('asset','=',$item['asset'])->where('status', '=',1)->sum('amount');
    

         $item[]=['deposit'=>$deb];
        //$col=collect($item)->all();
         //$item['debit']=debit::where('user', '=', $user->username)->where('asset','=',$item['asset'])->where('status', '=',1)->sum('amount');
      //   $col->get('debit', 500);
   }
  
   // $collection->put('debit', 345);
    //return $wall;

    return $mywallets=json_decode(json_encode($wall));

}
function get_balance($id, $user){

        
   $wallet=Asset::where('id', '=',$id)->first();
           
                $wallet->deposits=deposit::where('user', '=', $user)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                $wallet->debits=debit::where('user', '=', $user)->where('asset','=',$wallet->id)->where('status', '=',1)->sum('amount');
                $wallet->balance=$wallet->deposits-$wallet->debits;
           return $wallet;
            

 


}

    function debit($user, $amount, $asset, $source, $status){

         
        $new_debit=new debit;
        $new_debit->asset=$asset;
        $new_debit->user=$user;
        $new_debit->amount=$amount;
        $new_debit->source=$source;
        $new_debit->status=$status;

        if($new_debit->save()){
            return true;
        }

        else{
            return false;
        }

    } 
    
    
    
    function deposit($user, $amount, $asset, $source,$status){

         
        $deposit=new deposit;
        $deposit->asset=$asset;
        $deposit->user=$user;
        $deposit->amount=$amount;
        $deposit->source=$source;
        $deposit->status=$status;

        if($deposit->save()){
            return true;
        }

        else{
            return false;
        }

    }
function swap($id){
    $trade=Trade::where('trx_id', '=', $id)->get();
    //buyer pay
     deposit($trade->buyer, $trade->seller_amount, $trade->asset_two, 'Trade', 1);
     //seller pay
     deposit($trade->seller, $trade->buyer_amount, $trade->asset, 'Trade', 1);
     return true;
    
}
 function active_withrawal(){
    $user=session('user');
    $withrawal=Withdrawal::where('user', '=', $user)->where('status', '=',0)->first();
    if($withrawal==null){
        return false;
    }

    else{

        return true;
    }


 }
function developer(){
    return 'vikaxnet';
}

function get_date($timestamp){

    $date=date("M d, Y",strtotime($timestamp));
    return $date;
}

function get_datestamp($timestamp){

    $date=date("M d, Y",$timestamp);
    return $date;
}
function sumMsg($msg){
    return str_limit(strip_tags($msg),100,'...');
}

function order_status($status){
    if($status==1){
        
                                                               
        return 'Processed';
    }
    else{

        return 'Pending';
    }
}

    function d_valid($data){

        if(isset($data) && $data!=""){
            return true;
        }
        return false;
    }


?>

 