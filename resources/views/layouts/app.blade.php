<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>{{ config('app.name') }} &ndash; {{ $title }}</title>
  <link rel="shortcut icon" href="{{ asset('static/logo-small.svg') }}" type="image/x-icon">

  <!-- CSS files -->
  <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>

  @vite(['resources/css/app.css'])
</head>

<body>
  <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>
  <div class="page">
    <x-sidebar></x-sidebar>

    <x-navbar></x-navbar>

    <div class="page-wrapper">
      {{ $slot }}
    </div>
  </div>

  <div class="modal modal-blur fade" id="modal-application-error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h2 class="text-azure">Terjadi Masalah Dengan Aplikasi.</h2>
            <p>Harap Hubungi Helpdesk / IT Support.</p>
          </div>
          <div class="mt-5">
            <p>Status : <span class="font-monospace text-danger" id="statusCode"></span></p>
            <p>Message : <span class="font-monospace text-danger" id="Message"></span></p>
          </div>
          <div class="border p-3 rounded bg-light">
            <p>Method : <span id="Method"></span></p>
            <p>URL : <span id="URL"></span></p>
            <p>Headers :</p>
            <div class="mb-3">
              <textarea class="form-control" id="Headers"></textarea>
            </div>
            <p>Request :</p>
            <div class="mb-3">
              <textarea class="form-control" id="Request"></textarea>
            </div>
            <p>Response :</p>
            <div class="mb-3">
              <textarea class="form-control" id="Response"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <x-button class="ms-auto" data-bs-dismiss="modal">Close</x-button>
        </div>
      </div>
    </div>
  </div>

  <!-- Libs JS -->
  <script src="{{ asset('dist/libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
  <script src="{{ asset('dist/libs/litepicker/dist/litepicker.js') }}"></script>

  <!-- Tabler Core -->
  <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
  <script src="{{ asset('dist/js/demo.min.js') }}"></script>

  @vite(['resources/js/app.js'])
</body>

</html>