@extends('admin.layout.app')
@section('css')
<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    @media print
    {
        .not-print, .not-print *
        {
            display: none !important;
        }
    }

</style>
@endsection
@section('content')
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card" id="printableArea1">
                @include('admin.job_card.sub-job-card.job-order')
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card" id="printableArea2">
                @include('admin.job_card.sub-job-card.pre-press')
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card" id="printableArea3">
                @include('admin.job_card.sub-job-card.press')
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card" id="printableArea4">
                @include('admin.job_card.sub-job-card.post-press')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
@endsection
