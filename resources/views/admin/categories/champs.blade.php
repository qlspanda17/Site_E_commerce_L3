{{-- Champs communs aux formulaires de création et de modification d'une catégorie --}}
<div class="mb-3">
    <label class="form-label" for="nom">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $categorie?->nom) }}">
    @error('nom') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $categorie?->description) }}</textarea>
    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
