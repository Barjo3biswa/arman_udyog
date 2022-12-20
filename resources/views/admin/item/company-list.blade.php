@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Company Details</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.item.add-company')}}" class='btn btn-primary'>Add company</a>
                        </div>
                    </div>

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Code</th>
                                    <th>Company Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companys as $key=>$company)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ $company->company_code }}</th>
                                        <th>{{ $company->company_name }}</th>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan=3>No Item found</th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
