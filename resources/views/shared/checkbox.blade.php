@php
$class ??= null;
@endphp
<div @class(["form-check form-switch", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" value="1" name="{{ $name }}" class="form-check-input @error($name)  is-invalid @enderror" role="switch" id="{{ $name }}">
</div>
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror