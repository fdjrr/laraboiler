<x-app title="{{ $title }}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="card">
            <h3 class="card-header">{{ $title }}</h3>
            <form action="{{ route('api.v2.user.update', $user->id) }}" id="formUpdateUser" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label required">Name</label>
                  <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Email address</label>
                  <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Roles</label>
                  <select class="form-select" name="roles[]" id="select-states" multiple>
                    <option value="">Choose Role</option>
                    @forelse($roles as $role)
                      <option value="{{$role->id}}" @selected($user->hasRole($role->name))>{{$role->name}}</option>
                    @empty
                    @endforelse
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Permissions</label>
                  <select name="permissions[]" class="form-select" id="select-states" multiple>
                    <option value="">Choose Permissions</option>
                    @forelse($permissions as $permission)
                      <option value="{{$permission->id}}" @selected($user->permissions()->pluck('id')->contains($permission->id))>{{$permission->name}}</option>
                    @empty
                    @endforelse
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control">
                </div>
              </div>
              <div class="card-footer text-end">
                <a href="{{ route('users') }}" class="btn">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>
