<x-app title="{{ $title }}">
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            {{ $title }}
          </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            @can('create user')
            <x-button class="d-none d-sm-inline-block" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-role">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Create Role
            </x-button>
            <x-button class="d-sm-none btn-icon" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-role" aria-label="Create new role">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
            </x-button>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
              <x-card class="card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-shield" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                          <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                          <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Total Roles
                      </div>
                      <div class="text-muted">
                        {{ $roles->total() }}
                      </div>
                    </div>
                  </div>
                </div>
              </x-card>
            </div>
          </div>
        </div>

        <form action="{{ route('roles') }}">
          <div class="col-12">
            <div class="row d-flex justify-content-end">
              <div class="col-12 col-md-2 col-lg-2">
                <div class="mb-3">
                  <x-label>Entry</x-label>
                  <x-select name="entry">
                    <option value="">All</option>
                    @forelse ($entries as $entry)
                    <option value="{{ $entry->name }}" @selected(Request::get('entry')==$entry->name)>{{ $entry->name }}</option>
                    @empty
                    @endforelse
                  </x-select>
                </div>
              </div>
              <div class="col-12 col-md-4 col-lg-3">
                <div class="mb-3">
                  <x-label>Search</x-label>
                  <x-input name="search" placeholder="Search" value="{{ Request::get('search') }}" required></x-input>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <div class="mb-3">
                  <x-button type="submit" variant="primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                      <path d="M21 21l-6 -6" />
                    </svg>
                    Search
                  </x-button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <div class="col-12">
          <x-card>
            <div class="table-responsive">
              <table class="table table-vcenter card-table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($roles as $role)
                  <tr>
                    <td>{{ $role->name }}</td>
                    <td class="text-muted">{{ $role->guard_name }}</td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        @can('edit role')
                        <x-link href="{{ route('role.edit', $role->id) }}" class="btn btn-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                            <path d="M16 5l3 3" />
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                          </svg>
                        </x-link>
                        @endcan
                      </div>
                    </td>
                  </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              {{ $roles->links() }}
            </div>
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>

@can('create role')
<div class="modal modal-blur fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-create-role" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('api.v2.role.store') }}" id="formCreateRole" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <x-label class="required">Name</x-label>
            <x-input name="name" required></x-input>
          </div>
          <div class="mb-3">
            <x-label class="required">Guard Name</x-label>
            <x-input name="guard_name" required></x-input>
          </div>
          <div class="mb-3">
            <x-label class="required">Permissions</x-label>
            <x-select name="permissions[]" class="multiple-select" required multiple>
              <option value="">Choose Permissions</option>
              @forelse($permissions as $permission)
              <option value="{{ $permission->id }}">{{ $permission->name }}</option>
              @empty
              @endforelse
            </x-select>
          </div>
        </div>
        <div class="modal-footer">
          <x-button type="button" data-bs-dismiss="modal">Cancel</x-button>
          <x-button type="submit" class="ms-auto" variant="primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Create Permission
          </x-button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan