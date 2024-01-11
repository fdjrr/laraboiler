<div {{ $attributes->merge(['class' => 'card']) }}>
  @if ($title != '')
  <div class="card-header">
    <h3 class="card-title">{{ $title }}</h3>
  </div>
  @endif

  {{ $slot }}
</div>