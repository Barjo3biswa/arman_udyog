@extends('admin.layout.app')
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h5>Dimension</h5>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6" style="float-right">
                            <a href="{{ route('admin.item.add_dimension') }}" class="btn btn-primary btn-xs">Add New
                                Dimension</a>
                            {{-- <input type="button" class="btn btn-primary btn-xs" value="Add New Dimension"> --}}
                        </div>
                    </div>

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Length</th>
                                    <th>Breadth</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dimension as $key => $dimnsn)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ $dimnsn->length }}</th>
                                        <th>{{ $dimnsn->breadth }}</th>
                                        <th>{{ $dimnsn->code }}</th>
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
