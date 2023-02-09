<?php
namespace App\Helper;

use App\Models\JobCard;
use App\Models\JobOrder;

class helper{
    public static function totalOrder(){
        return JobCard::count();
    }
    public static function orderCompleted(){
        return JobCard::where('status','Order_delivered')->count();
    }
    public static function orderNotCompleted(){
        return JobCard::where('status','Order_Generated')->count();
    }
    public static function totalAmount($flag){
        if($flag=='this_month'){
            return JobOrder::whereMonth('created_at', date('m'))
                             ->whereYear('created_at', date('Y'))->sum('total_amount');
        }else{
            return JobOrder::sum('total_amount');
        }
    }
}
