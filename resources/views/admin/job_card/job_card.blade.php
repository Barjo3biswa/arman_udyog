@extends('admin.layout.app')
@section('css')
@livewireStyles
<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: #fff;
    color: #fff;
    padding: 3px 30px 8px 20px;
    color: #444;
    line-height: 15px;
}
</style>
@endsection
@section('content')
    <livewire:job-card :id="$editable_id"/>
@endsection
@section('scripts')
@livewireScripts
<script type="text/javascript">
    $(function() {
       $('#CalendarDateTime').Zebra_DatePicker();
    });
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

