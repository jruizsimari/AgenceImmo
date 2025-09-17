<form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="POST">
    @csrf
    @method($property->exists ? 'put' : 'post')
    <!-- Titre -->
    <div class="mb-4">
        <label for="title" class="form-label fw-bold">
            <i class="bi bi-pencil-square me-1"></i>Titre <span class="text-danger">*</span>
        </label>
        <input type="text"
               class="form-control @error('title') is-invalid @enderror"
               id="title"
               name="title"
               value="{{ old('title', $property->title) }}"
               placeholder="Ex: Magnifique appartement centre-ville">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="form-label fw-bold">
            <i class="bi bi-card-text me-1"></i>Description
        </label>
        <textarea class="form-control @error('description') is-invalid @enderror"
                  id="description"
                  name="description"
                  rows="4"
                  placeholder="Décrivez la propriété en détail...">{{ old('description', $property->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <!-- Surface -->
        <div class="col-md-6 mb-3">
            <label for="surface" class="form-label fw-bold">
                <i class="bi bi-rulers me-1"></i>Surface (m²) <span class="text-danger">*</span>
            </label>
            <div class="icon-input">
                <input type="number"
                       class="form-control @error('surface') is-invalid @enderror"
                       id="surface"
                       name="surface"
                       value="{{ old('surface', $property->surface) }}"
                       min="10">
                @error('surface')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Nombre de pièces -->
        <div class="col-md-6 mb-3">
            <label for="rooms" class="form-label fw-bold">
                <i class="bi bi-door-open me-1"></i>Nombre de pièces <span class="text-danger">*</span>
            </label>
            <div class="icon-input">
                <input type="number"
                       class="form-control @error('rooms') is-invalid @enderror"
                       id="rooms"
                       name="rooms"
                       value="{{ old('rooms', $property->rooms) }}"
                       min="1">
                @error('rooms')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chambres -->
        <div class="col-md-6 mb-3">
            <label for="bedrooms" class="form-label fw-bold">
                <i class="bi bi-person-arms-up me-1"></i>Nombre de chambres <span class="text-danger">*</span>
            </label>
            <div class="icon-input">
                <input type="number"
                       class="form-control @error('bedrooms') is-invalid @enderror"
                       id="bedrooms"
                       name="bedrooms"
                       value="{{ old('bedrooms', $property->bedrooms) }}"
                       min="0">
                @error('bedrooms')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Étage -->
        <div class="col-md-6 mb-3">
            <label for="floor" class="form-label fw-bold">
                <i class="bi bi-building me-1"></i>Étage
            </label>
            <div class="icon-input">
                <input type="number"
                       class="form-control @error('floor') is-invalid @enderror"
                       id="floor"
                       name="floor"
                       value="{{ old('floor', $property->floor) }}"
                       min="0">
                @error('floor')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Prix -->
    <div class="mb-4">
        <label for="price" class="form-label fw-bold">
            <i class="bi bi-currency-euro me-1"></i>Prix (€) <span class="text-danger">*</span>
        </label>
        <div class="icon-input">
            <input type="number"
                   class="form-control @error('price') is-invalid @enderror"
                   id="price"
                   name="price"
                   value="{{ old('price', $property->price) }}"
                   min="0">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <!-- Ville -->
        <div class="col-md-6 mb-3">
            <label for="city" class="form-label fw-bold">
                <i class="bi bi-geo-alt me-1"></i>Ville <span class="text-danger">*</span>
            </label>
            <div class="icon-input">
                <input type="text"
                       class="form-control @error('city') is-invalid @enderror"
                       id="city"
                       name="city"
                       value="{{ old('city', $property->city) }}">
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Code postal -->
        <div class="col-md-6 mb-3">
            <label for="postal_code" class="form-label fw-bold">
                <i class="bi bi-mailbox me-1"></i>Code postal <span class="text-danger">*</span>
            </label>
            <div class="icon-input">
                <input type="text"
                       class="form-control @error('postal_code') is-invalid @enderror"
                       id="postal_code"
                       name="postal_code"
                       value="{{ old('postal_code', $property->postal_code) }}"
                       pattern="[0-9]{5}">
                @error('postal_code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Adresse -->
    <div class="mb-4">
        <label for="address" class="form-label fw-bold">
            <i class="bi bi-house me-1"></i>Adresse <span class="text-danger">*</span>
        </label>
        <input type="text"
               class="form-control @error('address') is-invalid @enderror"
               id="address"
               name="address"
               value="{{ old('address', $property->address) }}">
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Statut vendu -->
    <div class="mb-4">
        <div class="form-check form-switch @error('sold') is-invalid @enderror">
            <input type="hidden"
                   name="sold"
                   value="0">
            <input class="form-check-input"
                   type="checkbox"
                   role="switch"
                   id="sold"
                   name="sold"
                   value="1"
                {{ old('sold', $property->sold) ? 'checked' : '' }}
                   style="transform: scale(1.3);">
            <label class="form-check-label fw-bold" for="sold">
                <i class="bi bi-check-circle me-1"></i>Propriété vendue
            </label>
            @error('sold')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    @include('shared.select', ['name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])

    <!-- Bouton de soumission -->
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i>
            @if($property->exists)
                Modifier le bien
            @else
                Ajouter un bien
            @endif
        </button>
    </div>
</form>



















