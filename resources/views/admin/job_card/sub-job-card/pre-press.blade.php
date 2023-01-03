@include('admin.job_card.sub-job-card.view-header')
<div class="card-header">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h4><u>Pre Press</u>
                <button class="btn btn-primary not-print" onclick="printDiv('printableArea2')">Print</button></h4>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Job Details</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_details}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Job Date</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->job_date}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Customer's Name</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->customerName->name}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Design Supplied By {{$job_card->design_by}}</label>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->design_by=='By_Party'? 'checked' : 'disabled'}}>
            <label for="By Party" class="col-form-label" >By Party</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->design_by=='By_Us'? 'checked' : 'disabled'}}>
            <label for="By Us" class="col-form-label" >By Us</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Colour</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->colour}}</strong></label>
        <label class="col-sm-2 col-form-label">Sub Colour</label>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->sub_coloue=='1+0'? 'checked' : 'disabled'}}>
            <label for="(1+0)" class="col-form-label" >(1+0)</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->sub_coloue=='1+1'? 'checked' : 'disabled'}}>
            <label for="(1+1)" class="col-form-label">(1+1)</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->sub_coloue=='4+0'? 'checked' : 'disabled'}}>
            <label for="4+0" class="col-form-label" >(4+0)</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->sub_coloue=='4+4'? 'checked' : 'disabled'}}>
            <label for="4+4" class="col-form-label">(4+4)</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Plate Size</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->ctp_size}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">CTP Type</label>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->ctp_type=='CTP'? 'checked' : 'disabled'}}>
            <label for="CTP" class="col-form-label">CTP</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->ctp_type=='SET'? 'checked' : 'disabled'}}>
            <label for="SET" class="col-form-label" >SET</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" {{$job_card->ctp_type=='OLD'? 'checked' : 'disabled'}}>
            <label for="OLD" class="col-form-label">OLD</label>
        </div>
    </div>
</div>
