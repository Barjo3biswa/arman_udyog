@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="card-block">
                    <h5 class="m-b-10">Insert GSM</h5>
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
                                <form action="{{ route('admin.item.thickness-save') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter GSM</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('gsm') is-invalid @enderror" name="gsm" id="gsm"
                                                placeholder="gsm" required value="{{old('gsm')}}">
                                            @error('gsm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Value is already been taken</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Paper Type</label>
                                        <div class="col-sm-10">
                                            <select name="gsm_types" id="gsm_types" class="form-control">
                                                <option value="">--Select--</option>
                                                @foreach ($gsm_types as $gsm_type)
                                                    <option value="{{$gsm_type->id}}">{{$gsm_type->name}}</option>
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
    <script></script>
@endsection
