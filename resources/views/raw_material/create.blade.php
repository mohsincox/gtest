@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Raw Material')

@section('content')
<div class="">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Raw Material Create</h5>
          {{-- <button class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-medical"></i> Create Raw Material</button> --}}
        </div>
        <div class="card-body">
          @include('raw_material._form')
        </div>
      </div>
    </div>

</div>
@endsection
