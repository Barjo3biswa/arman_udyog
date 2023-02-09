@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header card">
                <div class="card-block row">
                    <div class="col-md-2">
                        <h5 class="m-b-10">Job Orders Filter</h5>
                    </div>
                </div>
                <form action="">
                <div class="card-block row" style="padding: 2px 25px;">
                    <label class="col-sm-2 col-form-label">Customer Name/Phone No</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="customer" value="{{Request()->get('customer')}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Order Status</label>
                    <div class="col-sm-4">
                        <select id="filter_item_unit" class="form-control" name="status" >
                            <option value="">--Select--</option>
                            <option value="Pre_Press">Pre Press</option>
                            <option value="Press">Press</option>
                            <option value="Post_Press">Post Press</option>
                            <option value="Order_delivered">Order_delivered</option>
                            <option value="Order_Generated">Order_Generated</option>
                        </select>
                    </div>
                </div>

                <div class="card-block row" style="padding: 6px 25px;">
                    <label class="col-sm-2 col-form-label">Formdate</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="form_date" value="{{Request()->get('form_date')}}">
                    </div>

                    <label class="col-sm-2 col-form-label">Todate</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="to_date" value="{{Request()->get('to_date')}}">
                    </div>
                </div>
                <div class="card-block row" style="padding: 6px 25px;">
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" value="Search">
                        <a href="{{route('admin.job_orders')}}" class="btn btn-primary">Reset</a>
                    </div>
                </div>
                </form>
            </div>

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
                                    <th>Total Amount</th>
                                    <th>Advance Amount</th>
                                    <th>Balance Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_cards as $key => $job)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ $job->customerName->name }}</th>
                                        <th>{{ $job->job_date }}</th>
                                        <th>{{ $job->job_order->total_amount ?? '0.00' }}</th>
                                        <th>{{ $job->job_order->advance_amount ?? '0.00' }}</th>
                                        <th>{{ $job->job_order->balance_amount ?? '0.00' }}</th>
                                        <th>
                                            @if ($job->status == 'Post_Press')
                                                <label class="label label-warning">Order Is Completed</label>
                                            @elseif ($job->status == 'Order_Generated')
                                                <label class="label label-success">Job Order Is Generated</label>
                                            @elseif ($job->status = 'Order_delivered')
                                                <label class="label label-success">Delivered</label>
                                            @else
                                                <label class="label label-danger">Order Is Not Completed</label>
                                            @endif
                                        </th>
                                        <th>
                                            @if ($job->status == 'Order_Generated')
                                                <a href="{{ route('admin.job_card_view', ['id' => Crypt::encrypt($job->id)]) }}"
                                                    class="btn btn-primary">View & Print</a>
                                                <button class="btn btn-primary" onclick="SubmitAmount({{ $job->id }})"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    Deliver & Payment
                                                </button>
                                            @elseif ($job->status == 'Order_delivered')
                                                <a href="{{ route('admin.job_card_view', ['id' => Crypt::encrypt($job->id)]) }}"
                                                    class="btn btn-primary">View & Print</a>
                                                @if ($job->job_order->balance_amount > 0)
                                                    <button class="btn btn-primary"
                                                        onclick="SubmitAmount({{ $job->id }})" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        Deliver & Payment
                                                    </button>
                                                @endif
                                            @else
                                                <a href="{{ route('admin.job_card', ['id' => Crypt::encrypt($job->id)]) }}"
                                                    class="btn btn-primary">Edit </a>
                                            @endif

                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                {{ $job_cards->appends(request()->all()) }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Collect & Deliver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.save_collect') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Enter Amount</div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="amount" id="amount">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">Deliver or Not</div>
                                <div class="col-md-1">
                                    <input type="radio" name="deliver_or_not" value="1">
                                    <input type="hidden" name="job_id" id="job_id">
                                </div>
                                <div class="col-md-1">
                                    Yes
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="deliver_or_not" value="0">
                                </div>
                                <div class="col-md-1">
                                    No
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function SubmitAmount(id) {
            $('#job_id').empty();
            $('#job_id').val(id);
        }
        $( document ).ready(function() {
            jQuery('#mobile-collapse').click();
        });
    </script>
@endsection
