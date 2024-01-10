<select name="{{ $name }}" class="form-select {{ $class }}" {{ ($required=='true' ) ? 'required' : '' }} {{ ($multiple=='true' ) ? 'multiple' : '' }}>
  {{ $slot }}
</select>