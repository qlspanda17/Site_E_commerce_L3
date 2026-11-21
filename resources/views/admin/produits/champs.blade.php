{{-- Champs communs aux formulaires de création et de modification d'un produit --}}
<div class="mb-3">
    <label class="form-label" for="nom">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $product?->nom) }}">
    @error('nom') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $product?->description) }}</textarea>
    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-sm-6 mb-3">
        <label class="form-label" for="prix">Prix (€)</label>
        <input type="number" step="0.01" min="0.01" name="prix" id="prix" class="form-control" value="{{ old('prix', $product?->prix) }}">
        @error('prix') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-sm-6 mb-3">
        <label class="form-label" for="stock">Stock</label>
        <input type="number" step="1" min="0" name="stock" id="stock" class="form-control" value="{{ old('stock', $product?->stock) }}">
        @error('stock') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>

{{-- Cases à cocher : un produit peut avoir plusieurs catégories --}}
@php
    $categories_cochees = old('categories', $product ? $product->categories->pluck('id')->all() : []);
@endphp
<div class="mb-3">
    <span class="form-label d-block">Catégories</span>
    @forelse($categories as $categorie)
        <div class="form-check form-check-inline">
            <input type="checkbox" name="categories[]" value="{{ $categorie->id }}" id="categorie_{{ $categorie->id }}" class="form-check-input" @checked(in_array($categorie->id, $categories_cochees))>
            <label class="form-check-label" for="categorie_{{ $categorie->id }}">{{ $categorie->nom }}</label>
        </div>
    @empty
        <p class="text-muted small">Aucune catégorie. <a href="{{ route('admin_categorie_creer') }}">En créer une</a></p>
    @endforelse
    @error('categories') <div class="text-danger small">{{ $message }}</div> @enderror
    @error('categories.*') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="image">Image <span class="text-muted small">(jpg, png, webp… 2 Mo max)</span></label>
    @if($product?->image)
        <div class="mb-2"><img src="{{ $product->url_image() }}" alt="{{ $product->nom }}" class="rounded" style="height:80px; width:80px; object-fit:cover;"></div>
    @endif
    <input type="file" name="image" id="image" accept="image/*" class="form-control">
    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
