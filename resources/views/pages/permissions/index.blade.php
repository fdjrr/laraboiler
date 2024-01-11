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
            @can('create permission')
            <x-button class="d-none d-sm-inline-block" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-permission">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Create Permission
            </x-button>
            <x-button class="d-sm-none btn-icon" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-permission" aria-label="Create new user">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-checkered-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M11.013 12v9.754a13 13 0 0 1 -8.733 -9.754h8.734zm9.284 3.794a13 13 0 0 1 -7.283 5.951l-.001 -9.745h8.708a12.96 12.96 0 0 1 -1.424 3.794zm-9.283 -13.268l-.001 7.474h-8.986c-.068 -1.432 .101 -2.88 .514 -4.282a1 1 0 0 1 1.005 -.717a11 11 0 0 0 7.192 -2.256l.276 -.219zm1.999 7.474v-7.453l-.09 -.073a11 11 0 0 0 7.189 2.537l.342 -.01a1 1 0 0 1 1.005 .717c.413 1.403 .582 2.85 .514 4.282h-8.96z" stroke-width="0" fill="currentColor" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Total Permissions
                      </div>
                      <div class="text-muted">
                        {{ $permissions->total() }}
                      </div>
                    </div>
                  </div>
                </div>
              </x-card>
            </div>
          </div>
        </div>

        <form action="{{ route('permissions') }}">
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
                  <x-input name="search" placeholder="Search" value="{{ Request::get('search') }}" required='true'></x-input>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <div class="mb-3">
                  <x-button variant="primary">
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
          <x-card body="false">
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
                  @forelse($permissions as $permission)
                  <tr>
                    <td>{{ $permission->name }}</td>
                    <td class="text-muted">{{ $permission->guard_name }}</td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        @can('edit permission')
                        <x-link href="{{ route('permission.edit', $permission->id) }}" class="btn btn-icon">
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
              {{ $permissions->links() }}
            </div>
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>

@can('create permission')
<div class="modal modal-blur fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-create-permission" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Permission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('api.v2.permission.store') }}" id="formCreatePermission" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <x-label required="true">Name</x-label>
            <x-input name="name" required="true"></x-input>
          </div>
          <div class="mb-3">
            <x-label required="true">Guard Name</x-label>
            <x-input name="guard_name" required="true"></x-input>
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