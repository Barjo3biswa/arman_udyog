@extends('admin.layout.app')
@section('css')
@livewireStyles
@endsection
@section('content')
    <livewire:add-item />
@endsection
@section('scripts')
@livewireScripts
<script>
    window.addEventListener('openItemForm', function(){
        $('.reset-form').find('form')[0].reset();
    })
</script>
@endsection

