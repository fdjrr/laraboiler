<x-app title="{{ $title }}">
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <x-card title="{{ $title }}">
            <form action="{{ route('api.v2.user.profile.update') }}" id="formUpdateUserProfile" class="needs-validation" novalidate>
              <div class="card-body">
                <div class="mb-3">
                  <x-label class="required">Name</x-label>
                  <x-input name="name" value="{{ Auth::user()->name }}" required></x-input>
                </div>
                <div class="mb-3">
                  <x-label class="required">Email address</x-label>
                  <x-input type="email" name="email" value="{{ Auth::user()->email }}" required></x-input>
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
          </x-card>
        </div>
      </div>
    </div>
  </div>
</x-app>