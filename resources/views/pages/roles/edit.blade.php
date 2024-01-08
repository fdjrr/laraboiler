<x-app title="{{$title}}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="card">
            <h3 class="card-header">{{ $title }}</h3>
            <form action="{{ route('api.v2.role.update', $role->id) }}" id="formUpdateRole" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label required">Name</label>
                  <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Guard Name</label>
                  <input type="text" name="guard_name" value="{{ $role->guard_name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <div class="form-label">Permissions</div>
                  <select type="text" name="permissions[]" class="form-select" id="select-states" multiple>
                    <option value="">Choose Permissions</option>
                    @forelse($permissions as $permission)
                      <option value="{{$permission->id}}" @selected($role->hasPermissionTo($permission->name))>{{$permission->name}}</option>
                    @empty
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="card-footer text-end">
                <a href="{{ route('roles') }}" class="btn">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>
