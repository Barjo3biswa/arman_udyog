<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCard;
use App\Models\JobOrder;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class jobCardController extends Controller
{
    public function index(Request $request)
    {
        $editable_id = 0;
        if($request->has('id')){
            $editable_id=Crypt::decrypt($request->id);
        }
        return view('admin.job_card.job_card',compact('editable_id'));
    }

    public function jobOrders()
    {

        $job_cards = JobCard::with('job_order')->orderBy('id','DESC')->paginate(100);
        // dd($job_cards);
        return view('admin.job_card.job_orders',compact('job_cards'));
    }

    public function viewJobCard(Request $request)
    {
        if($request->has('id')){
            $id=Crypt::decrypt($request->id);
        }
        $job_card=JobCard::with('job_order')->where('id',$id)->first();
        return view('admin.job_card.view',compact('job_card'));
    }

    public function SaveCollect(Request $request){
        DB::beginTransaction();
        try{
            $job_card=JobCard::where('id',$request->job_id);
            if($request->deliver_or_not==1){
                $job_card->update(['status'=>'Order_delivered',]);
            }
            JobOrder::where('cob_card_id',$request->job_id)->decrement('balance_amount',$request->amount);

            $job_orders=JobOrder::where('cob_card_id',$request->job_id)->first();
            PaymentTransaction::create([
                'job_card_id' =>$job_orders->cob_card_id,
                'job_Order_id'=>$job_orders->id,
                'amount'      =>$request->amount,
                'remaining'   =>$job_orders->balance_amount-$request->amount,
            ]);

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','Something went wrong');
        }
        return redirect()->back()->with('success','successfully Updated');
    }
}
