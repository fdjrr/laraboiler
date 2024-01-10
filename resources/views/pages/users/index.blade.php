@use(Carbon\Carbon)

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
            @can('import user')
            <x-button class="d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-import-user">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package-import" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                <path d="M12 12l8 -4.5" />
                <path d="M12 12v9" />
                <path d="M12 12l-8 -4.5" />
                <path d="M22 18h-7" />
                <path d="M18 15l-3 3l3 3" />
              </svg>
              Import
            </x-button>
            <x-button class="d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-import-user" aria-label="Import User">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package-import" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                <path d="M12 12l8 -4.5" />
                <path d="M12 12v9" />
                <path d="M12 12l-8 -4.5" />
                <path d="M22 18h-7" />
                <path d="M18 15l-3 3l3 3" />
              </svg>
            </x-button>
            @endcan

            @can('export user')
            <x-button class="d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-export-user">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                <path d="M12 12l8 -4.5" />
                <path d="M12 12v9" />
                <path d="M12 12l-8 -4.5" />
                <path d="M15 18h7" />
                <path d="M19 15l3 3l-3 3" />
              </svg>
              Export
            </x-button>
            <x-button class="d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-export-user" aria-label="Export User">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                <path d="M12 12l8 -4.5" />
                <path d="M12 12v9" />
                <path d="M12 12l-8 -4.5" />
                <path d="M15 18h7" />
                <path d="M19 15l3 3l-3 3" />
              </svg>
            </x-button>
            @endcan

            @can('create user')
            <x-button class="d-none d-sm-inline-block" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-user">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Create User
            </x-button>
            <x-button class="d-sm-none btn-icon" variant="primary" data-bs-toggle="modal" data-bs-target="#modal-create-user" aria-label="Create new user">
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
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                      </svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      Total Users
                    </div>
                    <div class="text-muted">
                      {{ $users->total() }}
                    </div>
                  </div>
                </div>
              </x-card>
            </div>
          </div>
        </div>

        <form action="{{ route('users') }}">
          <div class="col-12">
            <div class="row d-flex justify-content-end">
              <div class="col-12 col-md-3 col-lg-3">
                <div class="mb-3">
                  <label class="form-label">Entry</label>
                  <x-select class="select-default" name="entry">
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
                  <x-input name="search" placeholder="Search" value="{{ Request::get('search') }}"></x-input>
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
          <x-card body="false">
            <div class="table-responsive">
              <table class="table table-vcenter card-table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td class="text-muted">{{ $user->email }}</td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        @can('delete user')
                        <x-button class="btn-icon btnDeleteUser" data-action="{{ route('api.v2.user.destroy', $user->id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                          </svg>
                        </x-button>
                        @endcan
                        @can('edit user')
                        <x-link href="{{ route('user.edit', $user->id) }}" class="btn btn-icon">
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
              {{ $users->links() }}
            </div>
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>

@can('create user')
<div class="modal modal-blur fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-create-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('api.v2.user.store') }}" id="formCreateUser" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <x-label required="true">Name</x-label>
            <x-input name="name" required="true"></x-input>
          </div>
          <div class="mb-3">
            <x-label required="true">Email Address</x-label>
            <x-input type="email" name="email" required="true"></x-input>
          </div>
          <div class="mb-3">
            <x-label required="true">Roles</x-label>
            <x-select class="multiple-select" name="roles[]" required="true" multiple="true">
              <option value="">Choose Role</option>
              @forelse($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
              @empty
              @endforelse
            </x-select>
          </div>
          <div class="mb-3">
            <x-label>Permissions</x-label>
            <x-select class="multiple-select" name="permissions[]" multiple="true">
              <option value="">Choose Permissions</option>
              @forelse($permissions as $permission)
              <option value="{{$permission->id}}">{{$permission->name}}</option>
              @empty
              @endforelse
            </x-select>
          </div>
          <div class="mb-3">
            <x-label required="true">Password</x-label>
            <x-input type="password" name="password" required="true"></x-input>
          </div>
          <div class="mb-3">
            <x-label required="true">Confirm Password</x-label>
            <x-input type="password" name="confirm_password" required="true"></x-input>
          </div>
        </div>
        <div class="modal-footer">
          <x-button data-bs-dismiss="modal">Cancel</x-button>
          <x-button type="submit" class="ms-auto" variant="primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Create User
          </x-button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('export user')
<div class="modal modal-blur fade" id="modal-export-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-primary"></div>
      <form action="{{ route('api.v2.user.export') }}" id="formExportUser">
        <div class="modal-body text-center py-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-primary icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
            <path d="M12 12l8 -4.5" />
            <path d="M12 12v9" />
            <path d="M12 12l-8 -4.5" />
            <path d="M15 18h7" />
            <path d="M19 15l3 3l-3 3" />
          </svg>
          <h3>Are you sure?</h3>
          <div class="text-secondary">Do you really want to export all users?</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col">
                <x-link href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</x-link>
              </div>
              <div class="col">
                <x-button type="submit" class="w-100" variant="primary">Export User</x-button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('import user')
<div class="modal modal-blur fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-import-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('api.v2.user.import') }}" id="formImportUser" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <x-label required="true">Select CSV File <a href="{{ Storage::url('samples/users.csv') }}">(Download
                Sample)</a></x-label>
            <label class="form-label required"></label>
            <x-input type="file" name="csv" required="true"></x-input>
          </div>
        </div>
        <div class="modal-footer">
          <x-button data-bs-dismiss="modal">Cancel</x-button>
          <x-button type="submit" class="ms-auto" variant="primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Import User
          </x-button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan