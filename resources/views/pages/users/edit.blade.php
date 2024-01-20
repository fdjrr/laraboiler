<x-app title="{{ $title }}">
  <x-page-header title="{{ $title }}"></x-page-header>

  <x-page-body>
    <div class="col-12">
      <x-card title="{{ $title }}">
        <form action="{{ route('api.v2.user.update', $user->id) }}" class="needs-validation" id="formUpdateUser" novalidate>
          <div class="card-body">
            <div class="mb-3">
              <x-label class="required">Name</x-label>
              <x-input name="name" value="{{ $user->name }}" required></x-input>
            </div>
            <div class="mb-3">
              <x-label class="required">Email address</x-label>
              <x-input type="email" name="email" value="{{ $user->email }}" required></x-input>
            </div>
            <div class="mb-3">
              <x-label class="required">Roles</x-label>
              <x-select class="multiple-select" name="roles[]" required multiple>
                <option value="">Choose Role</option>
                @forelse($roles as $role)
                <option value="{{ $role->id }}" @selected($user->hasRole($role->name))>{{ $role->name }}</option>
                @empty
                @endforelse
              </x-select>
            </div>
            <div class="mb-3">
              <x-label>Permissions</x-label>
              <x-select name="permissions[]" class="multiple-select" multiple>
                <option value="">Choose Permissions</option>
                @forelse($permissions as $permission)
                <option value="{{ $permission->id }}" @selected($user->permissions()->pluck('id')->contains($permission->id))>{{ $permission->name }}
                </option>
                @empty
                @endforelse
              </x-select>
            </div>
            <div class="mb-3">
              <x-label>Password</x-label>
              <x-input type="password" name="password"></x-input>
            </div>
            <div class="mb-3">
              <x-label>Confirm Password</x-label>
              <x-input type="password" name="confirm_password"></x-input>
            </div>
          </div>
          <div class="card-footer text-end">
            <x-link href="{{ route('users') }}" class="btn">Cancel</x-link>
            <x-button type="submit" variant="primary">Submit</x-button>
          </div>
        </form>
      </x-card>
    </div>
  </x-page-body>
</x-app>