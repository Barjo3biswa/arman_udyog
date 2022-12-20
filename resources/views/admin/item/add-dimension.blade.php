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
                                <form action="{{ route('admin.item.dimension-save') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Length</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="length" id="length"
                                                placeholder="length" value="{{ old('length') }}" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Breadth</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Breadth" name="breadth"
                                                id="bredth" value="{{ old('breadth') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" name="code" id="code" value="{{ old('code') }}" required>
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
    <script>
        $(document).ready(function() {
            $('#length').keyup(function() {
                console.log('ok');
                var l = $('#length').val();
                var b = $('#bredth').val();
                var code = l + '*' + b;
                $('#code').val(code);
            })

            $('#bredth').keyup(function() {
                console.log('ok');
                var l = $('#length').val();
                var b = $('#bredth').val();
                var code = l + 'X' + b;
                $('#code').val(code);
            })
        })
    </script>
@endsection
