<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Item;
use App\Models\JobCard as ModelsJobCard;
use App\Models\JobOrder;
use App\Models\MachineType;
use App\Models\PaymentTransaction;
use Livewire\Component;

class JobCard extends Component
{
    public $current_id;
    public $alert_status,$alert_type,$alert_msg; //alert message controll
    public $pre_press=true,$press,$post_press,$job_order=false; // Step controll
    public $job_date,$job_details,$customer_name,$design_by,$colour,$sub_color,$ctp_size,$ctp_type; //Pre Press Controll
    public $paper_type,$paper_sup_by,$gsm,$paper_cutting_size,$machine_type,$pages,$total_foram,$ss_or_bb,$juri_form,$wastage_qty,$total_impression; //Press Controll
    public $lamination,$uv,$punching,$center_printing,$perfect,$perforation,$sl_no,$mounting_by,$others,$date_of_delivery,$delivery_by;  //post Press Controll
    public $customer,$name,$email,$phone,$address; //Customer details Controll
   // Job Order Controll
    public $customer_name_jo,$phone_no_jo,$email_jo,$address_jo,$job_details_jo,$quantity_jo,$size_jo,$colour_jo,$paper_jo,$finishing_jo,$packaging_details_jo,$date_of_delivery_jo,$delivery_by_jo;
    public $plates,$papers,$machines;
    public $total_amount,$advance_amount,$balance_amount;

    public function mount($id)
    {
        $this->current_id = $id;
        // $this->solo_customer = Customer::where('id',$this->customer_name)->first();
        // dd($this->solo_customer);
        $this->edit();
    }


    public function render()
    {
        $this->customer = Customer::/* where('name','like','%'.$this->customer_name.'%') ->*/get();
        $this->plates   = Item::where('product_id',3)->get();
        $this->papers   = Item::where('product_id',1)->get();
        $this->machines = MachineType::get();

        // dd($this->plates);
        return view('livewire.job-card');
    }



    public function formStep($step)
    {
        // $this->alert_status=false;
        $this->pre_press=false;
        $this->press=false;
        $this->post_press=false;
        $this->job_order=false;
        if($step=="Pre_Press"){
            $this->pre_press=true;
        }elseif($step=="Press"){
            $this->press=true;
        }elseif($step=="Post_Press"){
            $this->post_press=true;
        }elseif($step=="Order_Generated"){
            $this->job_order=true;
        }

    }


    public function savePrePress()
    {
        $this->validate([
            'customer_name' => 'required',
            "job_date"      => 'required',
            "job_details"   => 'bail|required|max:255',
            "design_by"     => 'required',
            'colour'        => 'required',
            'sub_color'     => 'required',
            'ctp_size'      => 'required',
            'ctp_type'      => 'required',
        ]);
        try{
            $jobcarddetails=ModelsJobCard::updateOrcreate(
                [ 'id' => $this->current_id ],
                [

                    'job_details' => $this->job_details,
                    'customer_id' => $this->customer_name,
                    'job_date'    => $this->job_date,
                    'design_by'   => $this->design_by,
                    'colour'      => $this->colour,
                    'sub_coloue'  => $this->sub_color,
                    'ctp_size'    => $this->ctp_size,
                    'ctp_type'    => $this->ctp_type,
            ]);
            if($jobcarddetails->status==null){
                $jobcarddetails->status='Pre_Press';
                $jobcarddetails->save();
            }
            $this->current_id=$jobcarddetails->id;
            $this->alert_msg="Successfully Saved Pre Press Process..";
            $this->alert_type="success";
            $this->alert_status=true;
            $this->pre_press=false;
            $this->press=true;
            $this->post_press=false;
        }catch(\Exception $e){
            $this->alert_msg="Something Went wrong.....";
            $this->alert_type="danger";
            $this->alert_status=true;
        }
    }



    public function savePress()
    {
        $status=ModelsJobCard::where('id',$this->current_id)->first();
        // dd($status->status);
        if(!in_array($status->status??"", ['Pre_Press','Press','Post_Press'])){
            $this->alert_msg="Looks Like You Skip Some Previous Steps.";
            $this->alert_type="danger";
            $this->alert_status=true;
        }else{
            $this->validate([
                    'paper_type'  => 'required',
                    'paper_sup_by'  => 'required',
                    'gsm'  => 'required',
                    'paper_cutting_size'  => 'required',
                    'machine_type'  => 'required',
                    'pages'  => 'required',
                    'ss_or_bb'  => 'required',
            ]);
            try{
                $jobcarddetails=ModelsJobCard::updateOrcreate(
                    [ 'id' => $this->current_id ],
                    [
                    'paper_type'         => $this->paper_type,
                    'paper_supplied_by'	 => $this->paper_sup_by,
                    'gsm'                => $this->gsm,
                    'paper_cutting_size' =>	$this->paper_cutting_size,
                    'press_machine_type' =>	$this->machine_type,
                    'pages'	             => $this->pages,
                    'total_forma'        =>	$this->total_foram,
                    'ss_or_bb'	         => $this->ss_or_bb,
                    'juri_forma'	     => $this->juri_form,
                    'wastage_qty_of_paper' => $this->wastage_qty,
                    'total_impression'     => $this->total_impression,
                ]);
                if($jobcarddetails->status=='Pre_Press'){
                    $jobcarddetails->status='Press';
                    $jobcarddetails->save();
                }
                $this->alert_msg="Successfully Saved Press Process..";
                $this->alert_type="success";
                $this->alert_status=true;
                $this->pre_press=false;
                $this->press=false;
                $this->post_press=true;
            }catch(\Exception $e){
                // dd($e);
                $this->alert_msg="Something Went wrong.....";
                $this->alert_type="danger";
                $this->alert_status=true;
            }
        }
    }



    public function savePostPress()
    {
        $status=ModelsJobCard::where('id',$this->current_id)->first();
        if(!in_array($status->status??"", ['Press','Post_Press'])){
            // dd("ok");
            $this->alert_msg="Looks Like You Skip Some Previous Steps.";
            $this->alert_type="danger";
            $this->alert_status=true;
        }else{
            $this->validate([
                    'date_of_delivery' => 'required',
                    'delivery_by'      => 'required',
            ]);
            try{
                $jobcarddetails=ModelsJobCard::updateOrcreate(
                    [ 'id' => $this->current_id ],
                    [
                        'lamination'      => $this->lamination ? 1 : 0,
                        'uv'	          => $this->uv ? 1 : 0,
                        'punching'	      => $this->punching ? 1 : 0,
                        'center_printing' => $this->center_printing ? 1 : 0,
                        'perfect'	      => $this->perfect ? 1 : 0,
                        'perforation'	  => $this->perforation ? 1 : 0,
                        'sl_no'	          => $this->sl_no,
                        'mounting'	      => $this->mounting_by,
                        'Others'	      => $this->others,
                        'date_of_delivery'=> $this->date_of_delivery,
                        'delivery_by'     => $this->delivery_by
                ]);

                if($jobcarddetails->status=='Press'){
                    $jobcarddetails->status='Post_Press';
                    $jobcarddetails->save();
                }

                $this->alert_msg="Successfully Saved Post Process..";
                $this->alert_type="success";
                $this->alert_status=true;
                $this->pre_press=false;
                $this->press=false;
                $this->post_press=false;
                $this->job_order=true;
                $this->edit();
            }catch(\Exception $e){
                $this->alert_msg="Something Went wrong.....";
                $this->alert_type="danger";
                $this->alert_status=true;
            }
        }
    }

    public function edit()
    {
        if($this->current_id!=0){
            $editable_job=ModelsJobCard::where('id',$this->current_id)->first();
            // dd($editable_job);
            $this->job_date = $editable_job->job_date??null;
            $this->job_details = $editable_job->job_details??null;
            $this->customer_name = $editable_job->customer_id??null;
            $this->design_by = $editable_job->design_by??null;
            $this->colour = $editable_job->colour??null;
            $this->sub_color = $editable_job->sub_coloue??null;
            $this->ctp_size = $editable_job->ctp_size??null;
            $this->ctp_type = $editable_job->ctp_type??null;
            $this->paper_type = $editable_job->paper_type??null;
            $this->paper_sup_by = $editable_job->paper_supplied_by??null;
            $this->gsm = $editable_job->gsm??null;
            $this->paper_cutting_size = $editable_job->paper_cutting_size??null;
            $this->machine_type = $editable_job->press_machine_type??null;
            $this->pages = $editable_job->pages??null;
            $this->total_foram = $editable_job->total_forma??null;
            $this->ss_or_bb = $editable_job->ss_or_bb??null;
            $this->juri_form = $editable_job->juri_forma??null;
            $this->wastage_qty = $editable_job->wastage_qty_of_paper??null;
            $this->total_impression = $editable_job->total_impression??null;
            $this->lamination = $editable_job->lamination??null;
            $this->uv = $editable_job->uv??null;
            $this->punching = $editable_job->punching??null;
            $this->center_printing = $editable_job->center_printing??null;
            $this->perfect = $editable_job->perfect??null;
            $this->perforation = $editable_job->perforation??null;
            $this->sl_no = $editable_job->sl_no??null;
            $this->mounting_by = $editable_job->mounting??null;
            $this->others = $editable_job->Others??null;
            $this->date_of_delivery = $editable_job->date_of_delivery;
            $this->delivery_by = $editable_job->delivery_by;
            $this->jobOrder();
            if($editable_job->status=='Pre_press'){
                $this->formStep('Press');
            }else if($editable_job->status=='Press'){
                $this->formStep('Post_press');
            }else if($editable_job->status=="Post_Press"){
                $this->formStep('Order_Generated');
            }

        }
    }

    public function jobOrder()
    {
        $solo_customer = Customer::where('id',$this->customer_name)->first();
        $job_card      = ModelsJobCard::where('id',$this->current_id)->first();
        $this->customer_name_jo = $solo_customer->name;
        $this->phone_no_jo      = $solo_customer->phone_no;
        $this->email_jo         = $solo_customer->email;
        $this->address_jo       = $solo_customer->address;
        $this->job_details_jo   = $job_card->job_details;
        // $this->quantity_jo =;
        // $this->size_jo =;
        $this->colour_jo        = $job_card->colour.'/'.$job_card->sub_coloue.'/'.$job_card->gsm.'/'.$job_card->paper_type;
        $this->paper_jo         = $job_card->paper_supplied_by;
        // $this->finishing_jo =;
        // $this->packaging_details_jo =;
        $this->date_of_delivery_jo = $job_card->date_of_delivery;
        $this->delivery_by_jo      = $job_card->delivery_by;
    }

    public function saveAndGenerateOrder()
    {
        $status=ModelsJobCard::where('id',$this->current_id)->first();
        if(!in_array($status->status??"", ['Post_Press'])){
            $this->alert_msg="Looks Like You Skip Some Previous Steps.";
            $this->alert_type="danger";
            $this->alert_status=true;
        }else{
            $this->validate([
                'date_of_delivery_jo' => 'required',
                'delivery_by_jo'   => 'required',
                'total_amount'     => 'required',
                'advance_amount'   => 'required',
                'balance_amount'   => 'required',
            ]);
            try{
                JobOrder::updateOrcreate(
                    [   'cob_card_id' => $this->current_id ],
                    [
                        'cob_card_id'      => $this->current_id,
                        'customer_name'    => $this->customer_name_jo,
                        'job_details'	   => $this->job_details_jo,
                        'quantity'	       => null,
                        'size'	           => null,
                        'colour'	       => $this->colour_jo,
                        'paper'	           => $this->paper_jo,
                        'finishing'	       => null,
                        'packaging_details'=> null,
                        'delivery_date'	   => $this->date_of_delivery_jo,
                        'delivery_by'      => $this->delivery_by_jo,
                        'total_amount'     => $this->total_amount,
                        'advance_amount'   => $this->advance_amount,
                        'balance_amount'   => $this->balance_amount,
                    ]);
                $jobcarddetails = ModelsJobCard::where('id',$this->current_id)->first();
                if($jobcarddetails->status=='Post_Press'){
                    $jobcarddetails->status='Order_Generated';
                    $jobcarddetails->save();
                }

                $job_orders=JobOrder::where('cob_card_id',$this->current_id)->first();
                PaymentTransaction::create([
                'job_card_id' =>$job_orders->cob_card_id,
                'job_Order_id'=>$job_orders->id,
                'amount'      =>$this->advance_amount,
                'remaining'   =>$this->balance_amount,
            ]);
                $this->alert_msg="Order Successfully Generated..";
                $this->alert_type="success";
                $this->alert_status=true;
                return redirect()->route('admin.job_orders')->with('success','Successfully Created Job Order..');
            }catch(\Exception $e){
                $this->alert_msg="Something Went wrong.....";
                $this->alert_type="danger";
                $this->alert_status=true;
            }
        }
    }

    public function addCustomer()
    {
        $this->dispatchBrowserEvent('select2');
        $this->dispatchBrowserEvent('openCustomerform');
    }
    // public function saveCustomer()
    // {
    //     // $this->dispatchBrowserEvent('closeCustomerform');
    //     Customer::updateOrcreate([
    //          'name'        => $this->name,
    //          'phone_no'    => $this->phone,
    //          'email'	   => $this->email,
    //          'address'	   => $this->address,
    //     ]);
    //     $this->dispatchBrowserEvent('closeCustomerform');
    //     // $this->alert_msg="Customer Details Inserted";
    //     // $this->alert_type="success";
    //     // $this->alert_status=true;
    // }

    public function saveCustomer()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|min:10|max:10',
            'email' => 'required|email',
            'address' => 'required|max:255',
        ]);
        try{
            Customer::updateOrcreate([
                'name'        => $this->name,
                'phone_no'    => $this->phone,
                'email'	      => $this->email,
                'address'	  => $this->address,
            ]);
            $this->dispatchBrowserEvent('closeCustomerform');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('closeCustomerformwithException');
        }
    }

    public function changePaper()
    {
        $gsm_size= Item::where('id',$this->paper_type)->first();
        $this->gsm = $gsm_size->gsmdetails->gsm_name;
        $this->paper_cutting_size = $gsm_size->dimension->code;
        // dd($gsm_size);
    }

    public function balanceAmount()
    {
        $this->balance_amount=$this->total_amount-$this->advance_amount;
    }

    public function closeAlert()
    {
        $this->alert_status=false;
    }
}
