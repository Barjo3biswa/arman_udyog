<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

        $job_cards = JobCard::orderBy('id','DESC')->get();
        return view('admin.job_card.job_orders',compact('job_cards'));
    }
}
