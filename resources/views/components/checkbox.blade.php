<label class="form-check">
  <input type="checkbox" name="{{ $name }}" value="{{ $value }}" class="form-check-input" {{ ($checked=='true' ) ? 'checked' : '' }} />
  <span class="form-check-label">{{ $slot }}</span>
</label>