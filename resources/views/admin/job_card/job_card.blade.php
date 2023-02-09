@extends('admin.layout.app')
@section('css')
@livewireStyles
<style>
    .error-msg{
        color:rgb(201, 37, 37);
    }
.select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: #fff;
    color: #fff;
    padding: 1px 30px 8px 20px;
    color: #444;
    line-height: 15px;
}
</style>
@endsection
@section('content')
    <livewire:job-card :id="$editable_id"/>
@endsection
@livewireScripts
@section('scripts')
<script>
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            $('#cust_id').val(data);

        });
    });

    // $(function() {
    //    $('#CalendarDateTime').Zebra_DatePicker();
    //    $('#CalendarDateTime').on('change', function (e) {
    //         var data = $('#CalendarDateTime').select2("val");
    //         $('#job_date').val(data);

    //     });
    // });
    window.addEventListener('openCustomerform',function(){
        $('.bd-example-modal-lg').find('span').html('');
        $('.bd-example-modal-lg').modal('show');
    });
    window.addEventListener('closeCustomerform',function(){
        $('.bd-example-modal-lg').modal('hide');
        alert("successfully added Customer details");
    });
    window.addEventListener('closeCustomerformwithException',function(){
        $('.bd-example-modal-lg').modal('hide');
        alert("Something Went Wrong");
    });
</script>
@endsection

