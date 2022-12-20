@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h5>GSM List</h5>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6" style="float-right">
                            <a href="{{ route('admin.item.add-thickness') }}" class="btn btn-primary btn-xs">Add New
                                GSM</a>
                        </div>
                    </div>

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GSM</th>
                                    <th>Name</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thickness as $key => $thick)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ $thick->gsm }}</th>
                                        <th>{{ $thick->gsm_name}}</th>
                                        <th>{{ $thick->unit }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
