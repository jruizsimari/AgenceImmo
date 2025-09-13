@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-group', $class])>
    <i class="bi bi-gear"></i> <label class="form-label fw-bold" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    {{--TODO : fix display errors when the field is empty, add is-invalid class to select and test this after--}}
    @error('{{ $name }}')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <script>
        var settings = {};
        new TomSelect('#{{ $name }}', {plugins: { remove_button: {title: 'Supprimer'}}});
    </script>
</div>
