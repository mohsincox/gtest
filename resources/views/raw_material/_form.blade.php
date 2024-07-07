<form method="POST" action="{{ isset($rawMaterial) ? route('rawMaterials.update', $rawMaterial->id) : route('rawMaterials.store') }}">
    @isset($rawMaterial)
        @method('PUT')
    @endisset
    @csrf
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label required">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name" value="{{ old('name', isset($rawMaterial) ? $rawMaterial->name : '') }}"/>
        @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Remarks</label>
      <div class="col-sm-10">
        <textarea class="form-control @error('remarks') is-invalid @enderror" placeholder="Enter Remarks" name="remarks">{{ old('remarks', isset($rawMaterial) ? $rawMaterial->remarks : '') }}</textarea>
          @error('remarks')
              <span class="text-danger">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>

    @isset($rawMaterial)
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label required">Status</label>
        <div class="col-sm-10">
            <select name="status" class="js-example-basic-single form-select" data-allow-clear="true">
                <option value="">Select Status</option>
                <option value="Active" {{ old('status', $rawMaterial->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $rawMaterial->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
        <button type="submit" class="btn btn-primary">{{isset($rawMaterial) ? "Update" : 'Submit'}}</button>
      </div>
    </div>
</form>