<x-auth title="{{ $title }}">
  <x-card class="card-md">
    <h2 class="h2 text-center mb-4">Login to your account</h2>
    <form action="{{ route('api.v1.auth.login') }}" method="POST" id="formLogin" autocomplete="off" novalidate>
      <div class="mb-3">
        <x-label required="true">Email Address</x-label>
        <x-input type="email" name="email" placeholder="your@email.com" required="true"></x-input>
      </div>
      <div class="mb-3">
        <x-label required="true">
          Password
          <span class="form-label-description">
            <x-link href="{{ route('auth.forgot_password') }}">I forgot password</x-link>
          </span>
        </x-label>
        <div class="input-group input-group-flat">
          <x-input type="password" name="password" placeholder="Your Password" required="true"></x-input>
          <span class="input-group-text">
            <a href="#" class="link-secondary" id="togglePassword" title="Show password" data-bs-toggle="tooltip">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
              </svg>
            </a>
          </span>
        </div>
      </div>
      <div class="mb-3">
        <x-checkbox name="remember_me" value="true" checked="true">Remember me on this device</x-checkbox>
      </div>
      <div class="form-footer">
        <x-button type="submit" class="w-100" variant="primary">Sign In</x-button>
      </div>
    </form>
  </x-card>
</x-auth>