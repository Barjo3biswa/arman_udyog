<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="form">
            <div class="page-header card">
                <div class="card-block row">
                    <div class="col-md-2">
                        <h5 class="m-b-10">{{$job_order==false?'Job Card Details':'Job Order'}}</h5>
                    </div>
                </div>

            </div>
            <!-- Page-header end -->
            @if ($alert_status)
            <div class="alert alert-{{$alert_type}}" role="alert">
                {{$alert_msg}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span {{-- aria-hidden="true" --}}wire:click="closeAlert">X</span>
                </button>
            </div>
            @endif
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-block">
                                {{-- <form action="{{ route('admin.item.item-save') }}" method="post">
                                    @csrf --}}
                                    {{-- @if ($job_order==false) --}}
                                    <div class="form-group row">
                                        <div class="col md-12" style="align-content: center;">
                                            <button class="btn btn-{{$pre_press==true ? 'primary' :'secondary' }}" wire:click="formStep('Pre_Press')">Pre Press</button>
                                            <button class="btn btn-{{$press==true ? 'primary' :'secondary' }}" wire:click="formStep('Press')">Press</button>
                                            <button class="btn btn-{{$post_press==true ? 'primary' :'secondary' }}" wire:click="formStep('Post_Press')">Post Press</button>
                                            <button class="btn btn-{{$job_order==true ? 'primary' :'secondary' }}" wire:click="formStep('Order_Generated')">Job Order</button>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                <form id="pre_press" wire:submit.prevent="savePrePress" class="reset-form">
                                    @if ($pre_press==true)
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Customer's Name</strong></label>
                                        <div class="col-sm-4" {{--  wire:ignore --}}>
                                            <select class="form-control" {{-- id="select2-dropdown" --}} wire:model="customer_name">
                                                <option value="">--Select--</option>
                                                @foreach ($customer as $cust)
                                                    <option value="{{$cust->id}}" {{$customer_name==$cust->id?'selected':''}}>{{$cust->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('customer_name') <span class="error-msg">{{ $message }}</span> @enderror
                                        <div class="col-sm-2">
                                            <span class="btn btn-warning" wire:click="addCustomer" {{-- data-toggle="modal" data-target=".bd-example-modal-lg" --}}>Add Customer</span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="cust_id" wire:model="customer_name">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Job Date</strong></label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" wire:model="job_date">
                                            @error('job_date') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>

                                        <label class="col-sm-2 col-form-label"><strong>Job Details</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="job_details">
                                            @error('job_details') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Design Supplied By</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="By_Party" wire:model="design_by">
                                            <label for="By Party" class="col-form-label" >By Party</label>
                                            @error('design_by') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="By_Us" wire:model="design_by">
                                            <label for="By Us" class="col-form-label" >By Us</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Colour</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="colour">
                                            @error('colour') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Sub Colour</strong></label>
                                        <div class="col-sm-1">
                                            <input type="radio" value="1+0" wire:model="sub_color">
                                            <label for="(1+0)" class="col-form-label" >(1+0)</label>
                                            @error('sub_color') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="radio" value="1+1" wire:model="sub_color">
                                            <label for="(1+1)" class="col-form-label">(1+1)</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="radio" value="4+0" wire:model="sub_color">
                                            <label for="4+0" class="col-form-label" >(4+0)</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="radio" value="4+4" wire:model="sub_color">
                                            <label for="4+4" class="col-form-label">(4+4)</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Plate Size</strong></label>
                                        <div class="col-sm-4">
                                            {{-- <input type="text" class="form-control" wire:model="ctp_size"> --}}

                                            <select class="form-control" wire:model="ctp_size">
                                                <option value="">--Select--</option>
                                                @foreach ($plates as $plate)
                                                    <option value="{{$plate->id}}" {{$ctp_size==$plate->id?'selected':''}}>{{$plate->item_code}}</option>
                                                @endforeach
                                            </select>
                                            @error('ctp_size') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>CTP Type</strong></label>
                                        <div class="col-sm-1">
                                            <input type="radio" value="CTP" wire:model="ctp_type" >
                                            <label for="CTP" class="col-form-label">CTP</label>
                                            @error('ctp_type') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="radio" value="SET" wire:model="ctp_type">
                                            <label for="SET" class="col-form-label" >SET</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="radio" value="OLD" wire:model="ctp_type">
                                            <label for="OLD" class="col-form-label">OLD</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Save & Next"
                                                style="float:right">
                                        </div>
                                    </div>
                                    @endif
                                </form>
                                <form id="press" wire:submit.prevent="savePress" class="reset-form">
                                    @if ($press==true)
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Paper Type</strong></label>
                                        <div class="col-sm-4">
                                            {{-- <input type="text" class="form-control" wire:model="paper_type"> --}}
                                            <select class="form-control" wire:model="paper_type" wire:change="changePaper">
                                                <option value="">--Select--</option>
                                                @foreach ($papers as $paper)
                                                    <option value="{{$paper->id}}" {{$ctp_size==$paper->id?'selected':''}}>{{$paper->item_code}}</option>
                                                @endforeach
                                            </select>
                                            @error('paper_type') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                         <label class="col-sm-2 col-form-label"><strong>GSM</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="gsm">
                                            @error('gsm') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"><strong>Paper Cutting Size</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="paper_cutting_size">
                                            @error('paper_cutting_size') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Paper Supplied By</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="By Party" wire:model="paper_sup_by">
                                            <label for="By Party" class="col-form-label" >By Party</label>
                                            @error('paper_sup_by') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="By Us" wire:model="paper_sup_by">
                                            <label for="By Us" class="col-form-label">By Us</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Press Machine Type</strong></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" wire:model="machine_type" wire:change="changePaper">
                                                <option value="">--Select--</option>
                                                @foreach ($machines as $machine)
                                                    <option value="{{$machine->id}}" {{$ctp_size==$machine->id?'selected':''}}>{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('machine_type') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        {{-- <div class="col-sm-2">
                                            <input type="radio" value="Heidelbarg" wire:model="machine_type">
                                            <label for="Heidelbarg" class="col-form-label" >Heidelbarg</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="HMT DDemySingleCol" wire:model="machine_type">
                                            <label for="HMT DDemySingleCol" class="col-form-label">HMT DDemySingleCol</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="WEB-578/508" wire:model="machine_type">
                                            <label for="WEB-578/508" class="col-form-label" >WEB-578/508</label>
                                        </div> --}}
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Pages</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="pages">
                                            @error('pages') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Total Forma</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="total_foram">
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"><strong>Printing Side</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="1" wire:model="ss_or_bb">
                                            <label for="ss_or_bb" class="col-form-label" >Single Side</label>
                                            @error('ss_or_bb') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="0" wire:model="ss_or_bb">
                                            <label for="ss_or_bb1" class="col-form-label">back To Back</label>
                                        </div>


                                        {{-- <label class="col-sm-2 col-form-label"><strong>Single Side</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="ss_or_bb">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>back To Back</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="ss_or_bb">
                                        </div> --}}
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Juri Forma</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="juri_form">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Wastage Quantity Of Paper</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="wastage_qty">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Total Impression</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="total_impression">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Save & Next"
                                                style="float:right">
                                        </div>
                                    </div>
                                    @endif
                                </form>
                                <form id="post_press" wire:submit.prevent="savePostPress" class="reset-form">
                                    @if ($post_press==true)
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" wire:model="lamination">
                                            <label class="col-form-label"><strong>Lamination</strong></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" wire:model="uv">
                                            <label class="col-form-label"><strong>UV</strong></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" wire:model="punching">
                                            <label class="col-form-label"><strong>Punching</strong></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" wire:model="center_printing">
                                            <label class="col-form-label"><strong>Center Printing</strong></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" wire:model="perfect">
                                            <label class="col-form-label"><strong>Perfect</strong></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" wire:model="perforation">
                                            <label class="col-form-label"><strong>Perforation</strong></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Sl No.</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="sl_no">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Mouunting By</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="one_side" wire:model="mounting_by">
                                            <label for="By Party" class="col-form-label" >One Side</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="both_side" wire:model="mounting_by">
                                            <label for="By Us" class="col-form-label">Both Side</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Others</strong></label>
                                        <div class="col-sm-6">
                                            <textarea id="w3review" rows="4" cols="50" class="form-control" wire:model="others"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Date Of Delivery</strong></label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" wire:model="date_of_delivery">
                                            @error('date_of_delivery') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Delivery By</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="Hand" wire:model="delivery_by">
                                            <label for="delivery_by" class="col-form-label" >Hand</label>
                                            @error('delivery_by') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="Transport" wire:model="delivery_by">
                                            <label for="delivery_by1" class="col-form-label">Transport</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Submit"
                                                style="float:right">
                                        </div>
                                    </div>
                                    @endif
                                </form>
                                <form id="post_press" wire:submit.prevent="saveAndGenerateOrder" class="reset-form">
                                    @if ($job_order==true)
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Customer Name</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="customer_name_jo">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Phone No</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="phone_no_jo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="email_jo">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Address</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="address_jo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Job Details</strong></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model="job_details_jo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Quantity</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="quantity_jo">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Size</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="size_jo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Colour</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="colour_jo">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>paper</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="paper_jo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Finishing</strong></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model="finishing_jo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Packaging Details</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="packaging_details_jo">
                                        </div>
                                        <label class="col-sm-2 col-form-label"><strong>Date Of Delivery</strong></label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" wire:model="date_of_delivery_jo">
                                            @error('date_of_delivery_jo') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Delivery By</strong></label>
                                        <div class="col-sm-2">
                                            <input type="radio" value="Hand" wire:model="delivery_by_jo">
                                            <label for="delivery_by" class="col-form-label" >Hand</label>
                                            @error('delivery_by_jo') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" value="Transport" wire:model="delivery_by_jo">
                                            <label for="delivery_by1" class="col-form-label">Transport</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Total Amount</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="total_amount">
                                            @error('total_amount') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Advance Amount</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="advance_amount" wire:change="balanceAmount">
                                            @error('advance_amount') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Balance Amount</strong></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" wire:model="balance_amount">
                                            @error('balance_amount') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Generate Order" onclick="return confirm('Yoy Can`t modify After This Step');"
                                                style="float:right">
                                        </div>
                                    </div>
                                    @endif
                                </form>


                                <div class="modal fade bd-example-modal-lg" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Insert Customer Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveCustomer" class="reset-form">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"><strong>Name</strong></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" wire:model="name">
                                                        @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                                                    </div>

                                                    <label class="col-sm-2 col-form-label"><strong>Phone</strong></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" wire:model="phone">
                                                        @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
                                                    <div class="col-sm-4">
                                                        <input type="email" class="form-control" wire:model="email">
                                                        @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                                                    </div>

                                                    <label class="col-sm-2 col-form-label"><strong>Address</strong></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" wire:model="address">
                                                        @error('address') <span class="error-msg">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" value="Save changes" style="float:right">
                                                <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




