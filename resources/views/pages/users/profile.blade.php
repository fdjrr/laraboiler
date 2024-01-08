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
                  <label class="form-label required">Name</label>
                  <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Email Address</label>
                  <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
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
                <a href="{{ route('dashboard') }}" class="btn">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>