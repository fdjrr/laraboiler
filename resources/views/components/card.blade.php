<div class="card {{ $class }}">
  @if ($title)
  <div class="card-header">
    <h3 class="card-title">{{ $title }}</h3>
  </div>
  @endif

  @if ($body == 'true')
  <div class="card-body">
    {{ $slot }}
  </div>
  @else
  {{ $slot }}
  @endif
</div>