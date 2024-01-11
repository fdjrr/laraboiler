<label class="form-check form-switch">
  <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }}>
  <span class="form-check-label">{{ $slot }}</span>
</label>