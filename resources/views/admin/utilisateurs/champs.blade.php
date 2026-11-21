{{-- Champs communs aux formulaires de création et de modification d'un utilisateur --}}
<div class="mb-3">
    <label class="form-label" for="name">Nom</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $utilisateur?->name) }}">
    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $utilisateur?->email) }}">
    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="role">Rôle</label>
    <select name="role" id="role" class="form-select">
        <option value="user" @selected(old('role', $utilisateur?->role) == 'user')>Client</option>
        <option value="admin" @selected(old('role', $utilisateur?->role) == 'admin')>Administrateur</option>
    </select>
    @error('role') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
