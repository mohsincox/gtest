@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order No')

@section('content')
<div>
    
  <div class="clearfix">
      <div class="float-start">
          <h3>Order No List</h3>
      </div>
      <div class="float-end"><a href="{{ route('orderNos.create') }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-medical"></i> Create Order No</a></div>
  </div>

    <div class="card p-2">
      <div class="card-datatable table-responsive">
          <table id="example" class="table table-striped" >
              <thead>
                  <tr>
                      <th>SL</th>
                      <th>Order No.</th>
                      <th>Order Date</th>
                      <th>Customer</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $i = 0;
                  @endphp
                  @foreach($orderNos as $value)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $value->order_no }}</td>
                      <td>{{ $value->order_date }}</td>
                      <td>{{ $value->customer->name }}</td>
                      <td>{{ $value['remarks'] }}</td>
                      <td>{{ $value->status }}</td>
                      <td><a href="{{ route('orderNos.edit', $value['id']) }}" class="btn btn-success btn-sm"><i class="menu-icon tf-icons bx bx-edit-alt"></i> Edit</a></td>
                  </tr>
                  @endforeach
                  
              </tbody>
              <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Order No.</th>
                    <th>Order Date</th>
                    <th>Customer</th>
                    <th>Remarks</th>
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
