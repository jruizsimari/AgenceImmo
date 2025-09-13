@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-group', $class])>
    <i class="bi bi-gear"></i> <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error('{{ $name }}')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <script>
        var settings = {};
        new TomSelect('#{{ $name }}', {plugins: { remove_button: {title: 'Supprimer'}}});
    </script>
</div>
