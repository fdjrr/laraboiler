<x-app title="{{ $title }}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <x-card title="{{ $title }}">
            <form action="{{ route('api.v2.permission.update', $permission->id) }}" class="needs-validation" id="formUpdatePermission" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <x-label class="required">Name</x-label>
                  <x-input name="name" value="{{ $permission->name }}" required></x-input>
                </div>
                <div class="mb-3">
                  <x-label class="required">Guard Name</x-label>
                  <x-input name="guard_name" value="{{ $permission->guard_name }}" required></x-input>
                </div>
              </div>
              <div class="card-footer text-end">
                <x-link href="{{ route('permissions') }}" class="btn">Cancel</x-link>
                <x-button type="submit" variant="primary">Submit</x-button>
              </div>
            </form>
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>