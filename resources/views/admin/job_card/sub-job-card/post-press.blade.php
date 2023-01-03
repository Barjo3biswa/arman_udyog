@include('admin.job_card.sub-job-card.view-header')
<div class="card-header">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h4><u>Post Press</u>
                <button class="btn btn-primary not-print" onclick="printDiv('printableArea4')">Print</button></h4>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <input type="checkbox" {{$job_card->lamination=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>Lamination</strong></label>
        </div>
        <div class="col-sm-4">
            <input type="checkbox" {{$job_card->uv=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>UV</strong></label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">
            <input type="checkbox" {{$job_card->punching=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>Punching</strong></label>
        </div>
        <div class="col-sm-4">
            <input type="checkbox" {{$job_card->center_printing=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>Center Printing</strong></label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">
            <input type="checkbox" {{$job_card->perfect=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>Perfect</strong></label>
        </div>
        <div class="col-sm-4">
            <input type="checkbox" {{$job_card->perforation=='1'? 'checked' : 'disabled'}} disabled>
            <label class="col-form-label"><strong>Perforation</strong></label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Sl No.</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->sl_no}}</strong></label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Mouunting By</strong></label>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->mounting=='one_side'? 'checked' : 'disabled'}}>
            <label for="By Party" class="col-form-label" >One Side</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->mounting=='both_side'? 'checked' : 'disabled'}}>
            <label for="By Us" class="col-form-label">Both Side</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Others</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->Others}}</strong></label>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><strong>Date Of Delivery</strong></label>
        <label class="col-sm-4 col-form-label"><strong>: {{$job_card->date_of_delivery}}</strong></label>
        <label class="col-sm-2 col-form-label"><strong>Delivery By</strong></label>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->delivery_by=='Hand'? 'checked' : 'disabled'}}>
            <label for="delivery_by" class="col-form-label" >Hand</label>
        </div>
        <div class="col-sm-2">
            <input type="radio" {{$job_card->delivery_by=='Transport'? 'checked' : 'disabled'}}>
            <label for="delivery_by1" class="col-form-label">Transport</label>
        </div>
    </div>
</div>
