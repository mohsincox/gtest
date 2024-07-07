<form method="POST" action="{{ isset($orderNo) ? route('orderNos.update', $orderNo->id) : route('orderNos.store') }}">
    @isset($orderNo)
        @method('PUT')
    @endisset
    @csrf
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label required">Order No.</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('order_no') is-invalid @enderror" placeholder="Enter Order No." name="order_no" value="{{ old('order_no', isset($orderNo) ? $orderNo->order_no : '') }}"/>
        @error('order_no')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Order Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control @error('order_date') is-invalid @enderror" placeholder="Enter Order Date" name="order_date" value="{{ old('order_date', isset($orderNo) ? $orderNo->order_date : '') }}"/>
        @error('order_date')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label required">Customer</label>
      <div class="col-sm-10">
          <select name="customer_id" class="js-example-basic-single form-select" data-allow-clear="true">
              <option value="">Select Customer</option>
              @foreach($customerList as $value)
              <option value="{{ $value->id }}" {{ ((old('customer_id') == $value->id) or (isset($orderNo) and $orderNo->customer_id == $value->id ) ) ? 'selected' : null }}>{{ $value->name . ' - ' . $value->address }}</option>
              @endforeach
          </select>
          @error('customer_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
    </div>
    
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Remarks</label>
      <div class="col-sm-10">
        <textarea class="form-control @error('remarks') is-invalid @enderror" placeholder="Enter Remarks" name="remarks">{{ old('remarks', isset($orderNo) ? $orderNo->remarks : '') }}</textarea>
          @error('remarks')
              <span class="text-danger">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>

    @isset($orderNo)
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label required">Status</label>
        <div class="col-sm-10">
            <select name="status" class="js-example-basic-single form-select" data-allow-clear="true">
                <option value="">Select Status</option>
                <option value="Active" {{ old('status', $orderNo->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $orderNo->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
          @error('status')
              <span class="text-danger">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
    </div>
    @endisset

    <div class="row justify-content-end">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">{{isset($orderNo) ? "Update" : 'Submit'}}</button>
      </div>
    </div>
</form>