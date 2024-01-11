<x-app title="{{ $title }}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <x-card title="{{ $title }}">
            <form action="{{ route('api.v2.role.update', $role->id) }}" id="formUpdateRole" class="needs-validation" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <x-label class="required">Name</x-label>
                  <x-input name="name" value="{{ $role->name }}" required></x-input>
                </div>
                <div class="mb-3">
                  <x-label class="required">Guard Name</x-label>
                  <x-input name="guard_name" value="{{ $role->guard_name }}" required></x-input>
                </div>
                <div class="mb-3">
                  <x-label class="required">Permissions</x-label>
                  <x-select name="permissions[]" class="multiple-select" multiple>
                    <option value="">Choose Permissions</option>
                    @forelse($permissions as $permission)
                    <option value="{{ $permission->id }}" @selected($role->hasPermissionTo($permission->name))>{{ $permission->name }}
                    </option>
                    @empty
                    @endforelse
                  </x-select>
                </div>
              </div>
              <div class="card-footer text-end">
                <x-link href="{{ route('roles') }}" class="btn">Cancel</x-link>
                <x-button type="submit" variant="primary">Submit</x-button>
              </div>
            </form>
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>