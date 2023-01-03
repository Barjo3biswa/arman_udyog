@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Job Orders</h5>
                        </div>
                    </div>

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Order date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_cards as $key=>$job)
                                    <tr>
                                        <th>{{++$key}}</th>
                                        <th>{{$job->customerName->name}}</th>
                                        <th>{{$job->job_date}}</th>
                                        <th>
                                            @if ($job->status=='Post_Press')
                                                <label class="label label-warning">Order Is Completed</label>
                                            @elseif ($job->status=='Order_Generated')
                                                <label class="label label-success">Job Order Is Generated</label>
                                            @else
                                                <label class="label label-danger">Order Is Not Completed</label>
                                            @endif
                                        </th>
                                        <th>
                                            @if ($job->status=='Order_Generated')
                                                <a href="{{route('admin.job_card_view',['id'=>Crypt::encrypt($job->id)])}}" class="btn btn-primary">View Job Order </a>
                                            @else
                                                <a href="{{route('admin.job_card',['id'=>Crypt::encrypt($job->id)])}}" class="btn btn-primary">Edit </a>
                                            @endif

                                        </th>
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
