<label class="form-check">
  <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }}>
  <span class="form-check-label">{{ $slot }}</span>
</label>