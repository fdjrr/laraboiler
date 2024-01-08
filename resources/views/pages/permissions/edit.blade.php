<x-app title="{{$title}}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="card">
            <h3 class="card-header">{{ $title }}</h3>
            <form action="{{ route('api.v2.permission.update', $permission->id) }}" id="formUpdatePermission" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label required">Name</label>
                  <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Guard Name</label>
                  <input type="text" name="guard_name" value="{{ $permission->guard_name }}" class="form-control" required>
                </div>
              </div>
              <div class="card-footer text-end">
                <a href="{{ route('permissions') }}" class="btn">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>
