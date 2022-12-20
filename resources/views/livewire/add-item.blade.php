<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @if ($alert_status)
        <div class="alert alert-{{$alert_type}}" role="alert">
            {{$alert_msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
        @endif
        @if ($form == true)
            <div class="form">
                <div class="page-header card">
                    <div class="card-block row">
                        <div class="col-md-2">
                            <h5 class="m-b-10">{{$mode}} Item</h5>
                        </div>
                        <div class="col-md-2">
                            <button wire:click="showAdditemForm" class="btn btn-primary btn-xs">List Item</button>
                        </div>
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
                                    {{-- <form action="{{ route('admin.item.item-save') }}" method="post">
                                        @csrf --}}
                                    <form wire:submit.prevent="save" class="reset-form">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Product</label>
                                            <div class="col-sm-4">
                                                <select wire:model="product" id="product" class="form-control"
                                                    wire:click="getItemCode" required>
                                                    <option value="">--Select--</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ old('product') == $product->id ? 'selected' : '' }}>
                                                            {{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Select Unit</label>
                                            <div class="col-sm-4">
                                                <select wire:model="unit" id="unit" class="form-control" required>
                                                    <option value="">--Select--</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            {{ old('unit') == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Dimensn</label>
                                            <div class="col-sm-4">
                                                <select wire:model="dimension" id="dimension" class="form-control"
                                                    wire:click="getItemCode" required>
                                                    <option value="">--Select--</option>
                                                    @foreach ($dimensions as $dimension)
                                                        <option value="{{ $dimension->id }}"
                                                            {{ old('dimension') == $dimension->id ? 'selected' : '' }}>
                                                            {{ $dimension->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Select GSM</label>
                                            <div class="col-sm-4">
                                                <select wire:model="gsm" id="gsm" class="form-control"
                                                    wire:click="getItemCode" required>
                                                    <option value="">--Select--</option>
                                                    @foreach ($gsms as $gsm)
                                                        <option value="{{ $gsm->id }}"
                                                            {{ old('gsm') == $gsm->id ? 'selected' : '' }}>
                                                            {{ $gsm->gsm_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Item Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" wire:model="item_name" id="item_name"
                                                    wire:click="getItemCode" class="form-control" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Company Name</label>
                                            <div class="col-sm-4">
                                                <select wire:model="company" id="company" class="form-control"
                                                    wire:click="getItemCode" required>
                                                    <option value="">--Select--</option>
                                                    @foreach ($companys as $company)
                                                        <option value="{{ $company->id }}"
                                                            {{ old('company') == $company->id ? 'selected' : '' }}>
                                                            {{ $company->company_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Item Code</label>
                                            <div class="col-sm-10">
                                                <input readonly wire:model="item_code" id="code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Opening Quantity</label>
                                            <div class="col-sm-4">
                                                <input type="text" wire:model="quantity" id="quantity"
                                                    class="form-control" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01" wire:model="price" id="price"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="submit" class="btn btn-primary" value="Submit"
                                                    style="float:right">
                                            </div>
                                            {{-- <div wire:loading>
                                                Processing Payment...
                                            </div> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="page-header card">
                <div class="card-block row">
                    <div class="col-md-2">
                        <h5 class="m-b-10">Items Filter</h5>
                    </div>
                </div>
                    <div class="card-block row" style="padding: 2px 25px;">
                        <label class="col-sm-2 col-form-label">Item name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" wire:model="filter_item_name" id="filter_item_name">
                        </div>

                        <label class="col-sm-2 col-form-label">Item Unit</label>
                        <div class="col-sm-4">
                            {{-- <input type="text" class="form-control" wire:model="filter_item_unit" id="filter_item_unit"> --}}
                            <select wire:model="filter_item_unit" id="filter_item_unit" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ old('unit') == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-block row"  style="padding: 6px 25px;">
                        <label class="col-sm-2 col-form-label">Item Current Quantity</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" wire:model="filter_item_stock" id="filter_item_stock">
                        </div>

                        {{-- <label class="col-sm-2 col-form-label">
                            <button class="btn btn-primary">Filter</button>
                        </label> --}}

                    </div>

                {{-- <a href="{{ route('admin.item.add_item') }}" class="btn btn-primary btn-xs">Add New
                            Item</a> --}}

                {{-- <input type="button" class="btn btn-primary btn-xs" value="Add New Dimension"> --}}
            </div>
            <div class="card">
                <div class="page-body">
                    <div class="card-block row">
                        <div class="col-md-10" style="float:right">
                            <button wire:click="showAdditemForm" class="btn btn-primary btn-xs"
                            style="float:right">Add New
                                Item</button>
                            </div>
                        <div class="col-md-2" style="float:right">
                            <button wire:click="exportToExcel" class="btn btn-primary btn-xs"
                                >Export to
                                Excel</button>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>unit</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key => $items)
                                        <tr>
                                            <th>{{ ++$key }}</th>
                                            <th>{{ $items->item_code }}</th>
                                            <th>{{ $items->item_name }}</th>
                                            <th>{{ $items->unit_name }}</th>
                                            <th>{{ $items->closing_quantity }}</th>
                                            <th><i class="fa fa-trash fa-lg" aria-hidden="true"
                                                    style="color: rgb(192, 49, 49)"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                    wire:click="deleteThisItem({{ $items->id }})"></i>
                                                <i class="fa fa-edit fa-lg" aria-hidden="true" wire:click="editThisItem({{$items->id}})"
                                                    style="color: rgb(65, 83, 32)"></i>
                                            </th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</div>
