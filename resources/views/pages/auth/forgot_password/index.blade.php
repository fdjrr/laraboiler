<x-auth title="{{ $title }}">
  <x-card class="card-md">
    <h2 class="card-title text-center mb-4">{{ $title }}</h2>
    <p class="text-secondary mb-4">Enter your email address and your password will be reset and emailed to you.</p>
    <div class="mb-3">
      <x-label required="true">Email Address</x-label>
      <x-input type="email" name="email" placeholder="Enter Email" required="true"></x-input>
    </div>
    <div class="form-footer">
      <x-button class="w-100" variant="primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
          <path d="M3 7l9 6l9 -6"></path>
        </svg>
        Send me new password
      </x-button>
    </div>
  </x-card>

  <div class="text-center text-secondary mt-3">
    Forget it, <a href="{{ route('auth.login') }}">send me back</a> to the sign in screen.
  </div>
</x-auth>