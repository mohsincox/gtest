@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Supplier')

@section('content')
<div class="">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Supplier Update</h5>
        </div>
        <div class="card-body">
          @include('supplier._form')
        </div>
      </div>
    </div>

</div>
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection