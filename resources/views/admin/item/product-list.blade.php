@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h5>Product Details</h5>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key=>$product)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ $product->product_code }}</th>
                                        <th>{{ $product->product_name }}</th>
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
