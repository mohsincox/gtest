<form method="POST" action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}">
    @isset($supplier)
        @method('PUT')
    @endisset
    @csrf
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label required">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name" value="{{ old('name', isset($supplier) ? $supplier->name : '') }}"/>
        @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label required">Phone Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter Phone Number" name="phone_number" value="{{ old('phone_number', isset($supplier) ? $supplier->phone_number : '') }}"/>
        @error('phone_number')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" value="{{ old('email', isset($supplier) ? $supplier->email : '') }}"/>
        @error('email')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">NID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('nid') is-invalid @enderror" placeholder="Enter NID" name="nid" value="{{ old('nid', isset($supplier) ? $supplier->nid : '') }}"/>
        @error('nid')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" name="address">{{ old('address', isset($supplier) ? $supplier->address : '') }}</textarea>
          @error('address')
              <span class="text-danger">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Country</label>
      <div class="col-sm-10">
          <select name="country_id" class="js-example-basic-single form-select" data-allow-clear="true">
              <option value="">Select Country</option>
              @foreach($countryList as $value)
              <option value="{{ $value->id }}" {{ ((old('country_id') == $value->id) or (isset($supplier) and $supplier->country_id == $value->id ) ) ? 'selected' : null }}>{{ $value->country_name }}</option>
              @endforeach
          </select>
          @error('country_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
    </div>

    @isset($supplier)
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label required">Status</label>
        <div class="col-sm-10">
            <select name="status" class="js-example-basic-single form-select" data-allow-clear="true">
                <option value="">Select Status</option>
                <option value="Active" {{ old('status', $supplier->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $supplier->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
        <button type="submit" class="btn btn-primary">{{isset($supplier) ? "Update" : 'Submit'}}</button>
      </div>
    </div>
</form>