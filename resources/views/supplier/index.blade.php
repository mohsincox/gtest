@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Supplier')

@section('content')
<div>
    
  <div class="clearfix">
      <div class="float-start">
          <h3>Supplier List</h3>
      </div>
      <div class="float-end"><a href="{{ route('suppliers.create') }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-medical"></i> Create Supplier</a></div>
  </div>

    <div class="card p-2">
      <div class="card-datatable table-responsive">
          <table id="example" class="table table-striped" >
              <thead>
                  <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>NID</th>
                      <th>Address</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $i = 0;
                  @endphp
                  @foreach($suppliers as $value)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->phone_number }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->nid }}</td>
                      <td>{{ $value->address }}</td>
                      <td>@isset($value->country) {{ $value->country->country_name }} @endisset</td>
                      <td>{{ $value->status }}</td>
                      <td><a href="{{ route('suppliers.edit', $value['id']) }}" class="btn btn-success btn-sm"><i class="menu-icon tf-icons bx bx-edit-alt"></i> Edit</a></td>
                  </tr>
                  @endforeach
                  
              </tbody>
              <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>NID</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
          </table>
      </div>
    </div>

</div>
@endsection


@section('page-style')
  <link rel="stylesheet" href="{{ asset('assets2/dataTables.bootstrap5.css') }}">
@endsection

@section('page-script')
  <script src="{{ asset('assets2/dataTables.js') }}"></script>
  <script src="{{ asset('assets2/dataTables.bootstrap5.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
@endsection
