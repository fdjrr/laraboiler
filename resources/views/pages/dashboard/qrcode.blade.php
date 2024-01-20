<x-app title="{{ $title }}">
  <x-page-header title="{{ $title }}"></x-page-header>

  <x-page-body>
    <div class="col-12 col-md-4 col-lg-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="mb-3">
            <img src="{!! $qrcode_image !!}" alt="" class="img-fluid">
          </div>
          <a href="{{ route('dashboard') }}" class="btn">Kembali</a>
        </div>
      </div>
    </div>
  </x-page-body>
</x-app>