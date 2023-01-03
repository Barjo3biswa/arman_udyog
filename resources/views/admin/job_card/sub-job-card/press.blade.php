
@include('admin.job_card.sub-job-card.view-header')
<div class="card-header">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h4><u>Press</u>
                <button class="btn btn-primary not-print" onclick="printDiv('printableArea3')">Print</button></h4>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Paper Type</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->paper_type}}</strong></label>
        <label class="col-sm-2 col-form-label">Paper Supplied By</label>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->paper_supplied_by=='By Party'? 'checked' : 'disabled'}}>
            <label for="By Party" class="col-form-label" >By Party</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->paper_supplied_by=='By Us'? 'checked' : 'disabled'}}>
            <label for="By Us" class="col-form-label">By Us</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">GSM</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->gsm}}</strong></label>
        <label class="col-sm-2 col-form-label">Paper Cutting Size</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->paper_cutting_size}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Press Machine Type</label>
        <div class="col-sm-2">
            <input type="radio" value="Heidelbarg" {{$job_card->press_machine_type=='Heidelbarg'? 'checked' : 'disabled'}}>
            <label for="Heidelbarg" class="col-form-label" >Heidelbarg</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" value="HMT DDemySingleCol" {{$job_card->press_machine_type=='HMT DDemySingleCol'? 'checked' : 'disabled'}}>
            <label for="HMT DDemySingleCol" class="col-form-label">HMT DDemySingleCol</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" value="WEB-578/508" {{$job_card->press_machine_type=='WEB-578/508'? 'checked' : 'disabled'}}>
            <label for="WEB-578/508" class="col-form-label" >WEB-578/508</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pages</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->pages}}</strong></label>
        <label class="col-sm-2 col-form-label">Total Forma</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->total_forma}}</strong></label>
    </div>

    <div class="form-group row">

        <label class="col-sm-2 col-form-label">Printing Side</label>
        <div class="col-sm-2">
            <input type="radio" value="1" {{$job_card->ss_or_bb=='1'? 'checked' : 'disabled'}}>
            <label for="ss_or_bb" class="col-form-label" >Single Side</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" value="0" {{$job_card->ss_or_bb=='0'? 'checked' : 'disabled'}}>
            <label for="ss_or_bb1" class="col-form-label">back To Back</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Juri Forma</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->juri_forma}}</strong></label>
        <label class="col-sm-2 col-form-label">Wastage Quantity Of Paper</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->wastage_qty_of_paper}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Total Impression</label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->total_impression}}</strong></label>
    </div>
</div>
