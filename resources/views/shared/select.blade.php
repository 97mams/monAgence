@php
$name ??='';
$label ??= ucfirst($name);
$class ??= null;
$value ??= '';
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name}}[] " id="{{ $name }}" multiple>
        @foreach($options as $key => $valueOption)
        <option @selected($value->contains($key)) value="{{ $key }}">{{ $valueOption }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>