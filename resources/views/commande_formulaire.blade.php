@extends('layouts.app')

@section('titre', 'Livraison')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Informations de livraison</h1>

            <form method="post" action="{{ route('commande_valider') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nom_livraison">Nom du destinataire</label>
                    <input type="text" name="nom_livraison" id="nom_livraison" class="form-control" value="{{ old('nom_livraison', $nom_defaut) }}">
                    @error('nom_livraison') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="adresse_livraison">Adresse</label>
                    <input type="text" name="adresse_livraison" id="adresse_livraison" class="form-control" value="{{ old('adresse_livraison') }}">
                    @error('adresse_livraison') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="message">Petit mot (optionnel)</label>
                    <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                    @error('message') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="mode_livraison">Mode de livraison</label>
                    <select name="mode_livraison" id="mode_livraison" class="form-select">
                        <option value="standard" @selected(old('mode_livraison') == 'standard')>Standard</option>
                        <option value="express" @selected(old('mode_livraison') == 'express')>Express</option>
                    </select>
                    @error('mode_livraison') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="conditions" id="conditions" value="1" class="form-check-input">
                    <label class="form-check-label" for="conditions">J'ai lu et j'accepte les <a href="{{ route('terme') }}" target="_blank">conditions générales</a></label>
                    @error('conditions') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Valider la commande</button>
                <a href="{{ route('panier_index') }}" class="btn btn-outline-secondary">Retour au panier</a>
            </form>
        </div>
    </div>
@endsection
