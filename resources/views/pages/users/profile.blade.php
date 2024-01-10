<x-app title="{{ $title }}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="card">
            <h3 class="card-header">{{ $title }}</h3>
            <form action="{{ route('api.v2.user.profile.update') }}" id="formUpdateUserProfile" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <x-label required="true">Name</x-label>
                  <x-input name="name" value="{{ Auth::user()->name }}" required="true"></x-input>
                </div>
                <div class="mb-3">
                  <x-label required="true">Email address</x-label>
                  <x-input type="email" name="email" value="{{ Auth::user()->email }}" required="true"></x-input>
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
                <x-link href="{{ route('dashboard') }}" class="btn">Cancel</x-link>
                <x-button type="submit" variant="primary">Submit</x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>