@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="card-block">
                    <h5 class="m-b-10">Insert Dimension</h5>
                </div>
            </div>
            <!-- Page-header end -->

            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-block">
                                <form action="{{ route('admin.item.item-save') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Product</label>
                                        <div class="col-sm-4">
                                            <select name="product" id="product" class="form-control" required>
                                                <option value="">--Select--</option>
                                                @foreach ($products as $product)
                                                    <option value="{{$product->id}}" {{old('product')==$product->id?'selected':''}}>{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">Select Unit</label>
                                        <div class="col-sm-4">
                                            <select name="unit" id="unit" class="form-control" required>
                                                <option value="">--Select--</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{$unit->id}}" {{old('unit')==$unit->id?'selected':''}}>{{$unit->unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Dimensn</label>
                                        <div class="col-sm-4">
                                            <select name="dimension" id="dimension" class="form-control" required>
                                                <option value="">--Select--</option>
                                                @foreach ($dimensions as $dimension)
                                                    <option value="{{$dimension->id}}" {{old('dimension')==$dimension->id?'selected':''}}>{{$dimension->code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Select GSM</label>
                                        <div class="col-sm-4">
                                            <select name="gsm" id="gsm" class="form-control" required>
                                                <option value="">--Select--</option>
                                                @foreach ($gsms as $gsm)
                                                    <option value="{{$gsm->id}}" {{old('gsm')==$gsm->id?'selected':''}}>{{$gsm->gsm}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Submit"
                                                style="float:right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->
    <div id="styleSelector">
    </div>
@endsection
@section('scripts')
@endsection
