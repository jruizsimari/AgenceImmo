@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $icon ??= '';
    $placeholder ??= '';
    $type ??= 'text';
    $rows ??= '4';
@endphp

    <!-- {{ $label }} -->
<div @class(['form-group mb-4', $class])>
    <label for="{{ $name }}" class="form-label fw-bold">
        <i class="{{ $icon }} me-1"></i>{{ $label }} <span class="text-danger">*</span>
    </label>
    @if($type === 'textarea')
        <textarea
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
        >{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}"
               class="form-control @error($name) is-invalid @enderror"
               id="{{ $name }}"
               name="{{ $name }}"
               value="{{ old($name, $value) }}"
               placeholder="{{ $placeholder }}">
    @endif
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
