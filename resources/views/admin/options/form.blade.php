<form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="POST">
    @csrf
    @method($option->exists ? 'put' : 'post')
    <!-- Nom de l'option -->
    <div class="mb-4">
        <label for="name" class="form-label fw-bold">
            <i class="bi bi-pencil-square me-1"></i>Nom de l'option <span class="text-danger">*</span>
        </label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror"
               id="name"
               name="name"
               value="{{ old('name', $option->name) }}"
               placeholder="Ex: piscine, ascenseur, garage, etc.">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i>
            @if($option->exists)
                Modifier l'option
            @else
                Ajouter l'option
            @endif
        </button>
    </div>
</form>



















