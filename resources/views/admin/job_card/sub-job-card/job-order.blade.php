@include('admin.job_card.sub-job-card.view-header')
<div class="card-header">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h4><u>Job Order</u>
            {{-- <button class="btn btn-primary not-print" onclick="printDiv('printableArea1')">Print</button></h4> --}}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Customer Name</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->customerName->name}}</strong></label>
        <label class="col-sm-2 col-form-label">Phone No</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->customerName->phone_no}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->customerName->email}}</strong></label>
        <label class="col-sm-2 col-form-label">Address</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->customerName->address}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Job Details</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->job_details}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Quantity</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->quantity}}</strong></label>
        <label class="col-sm-2 col-form-label">Size</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->size}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Colour</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->colour}}</strong></label>
        <label class="col-sm-2 col-form-label">paper</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->paper}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Finishing</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->finishing}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Packaging Details</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->packaging_details}}</strong></label>
        <label class="col-sm-2 col-form-label">Date Of Delivery</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->delivery_date}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Delivery By</label>
        <div class="col-sm-2">
            <input type="radio" value="Hand" {{$job_card->delivery_by=='Hand'? 'checked' : 'disabled'}}>
            <label for="delivery_by" class="col-form-label" >Hand</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" value="Transport" {{$job_card->delivery_by=='Transport'? 'checked' : 'disabled'}}>
            <label for="delivery_by1" class="col-form-label">Transport</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Total Amount</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->total_amount}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Advance Amount</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->advance_amount}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Balance Amount</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_order->balance_amount}}</strong></label>
    </div>
</div>
