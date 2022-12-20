@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="card-block">
                    <h5 class="m-b-10">Insert Company</h5>
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
                                <form action="{{ route('admin.item.company-save') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Company Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name" id="company_name"
                                                placeholder="Company Name" required value="{{old('company_name')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Company Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_code" id="company_code"
                                                placeholder="Company Code" required value="{{old('company_code')}}">
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
