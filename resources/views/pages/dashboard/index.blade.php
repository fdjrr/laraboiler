<x-app title="{{ $title }}">
  <x-page-header title="{{ $title }}"></x-page-header>

  <x-page-body>
    <div class="col-12 col-md-4 col-lg-4">
      <div class="card">
        <div class="card-body">
          @if(Session::get('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
          @endif

          <form action="/verifikasi" method="POST">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">OTP</label>
              <input type="text" name="secret" class="form-control">
            </div>
            <a href="/qrcode" class="btn">Scan QR</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </x-page-body>
</x-app>