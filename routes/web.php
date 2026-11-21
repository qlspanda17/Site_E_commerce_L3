<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProduitAdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\MotDePasseController;


//PUBLIC
Route::get('/', [WelcomeController::class, 'welcome_index'])->name('welcome_index');

Route::get('/produits', [ProduitController::class, 'produit_index'])->name('produit_index');
Route::get('/produits/{id}', [ProduitController::class, 'produit_afficher'])->name('produit_afficher');

Route::get('/panier', [PanierController::class, 'panier_index'])->name('panier_index');
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier_ajouter');
Route::post('/panier/retirer/{id}', [PanierController::class, 'retirer'])->name('panier_retirer');
Route::post('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier_supprimer');

Route::view('/terme', 'terme')->name('terme');


//VISITEURS
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [InscriptionController::class, 'inscription_index'])->name('inscription_index');
    Route::post('/inscription', [InscriptionController::class, 'inscription_store'])->name('inscription_store');
    Route::get('/connexion', [ConnexionController::class, 'connexion_index'])->name('connexion_index');
    Route::post('/connexion', [ConnexionController::class, 'connexion_store'])->name('connexion_store');
    Route::get('/mot_de_passe_oublie', [MotDePasseController::class, 'index'])->name('mot_de_passe_oublie');
    Route::post('/mot_de_passe_oublie', [MotDePasseController::class, 'envoyer'])->name('mot_de_passe_envoyer');
    Route::get('/reinitialiser_mot_de_passe/{token}', [MotDePasseController::class, 'reset'])->name('mot_de_passe_reset');
    Route::post('/reinitialiser_mot_de_passe', [MotDePasseController::class, 'maj_mot_de_passe'])->name('mot_de_passe_maj');
});


//CONNECTÉS
Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('deconnexion');
    Route::delete('/supprimer_compte', [ConnexionController::class, 'supprimer_compte'])->name('supprimer_compte');

    Route::get('/commande', [CommandeController::class, 'formulaire'])->name('commande_formulaire');
    Route::post('/commande', [CommandeController::class, 'valider'])->name('commande_valider');
    Route::get('/mes_commandes', [CommandeController::class, 'index'])->name('commandes_index');
});


//ADMIN (le middleware "admin" vérifie le rôle de l'utilisateur connecté)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    Route::get('/produits', [ProduitAdminController::class, 'liste'])->name('admin_produit_liste');
    Route::get('/produits/creer', [ProduitAdminController::class, 'creer'])->name('admin_produit_creer');
    Route::post('/produits', [ProduitAdminController::class, 'enregistrer'])->name('admin_produit_enregistrer');
    Route::get('/produits/{id}/modifier', [ProduitAdminController::class, 'modifier'])->name('admin_produit_modifier');
    Route::put('/produits/{id}', [ProduitAdminController::class, 'mettre_a_jour'])->name('admin_produit_mettre_a_jour');
    Route::delete('/produits/{id}', [ProduitAdminController::class, 'supprimer'])->name('admin_produit_supprimer');

    Route::get('/categories', [CategorieController::class, 'liste'])->name('admin_categorie_liste');
    Route::get('/categories/creer', [CategorieController::class, 'creer'])->name('admin_categorie_creer');
    Route::post('/categories', [CategorieController::class, 'enregistrer'])->name('admin_categorie_enregistrer');
    Route::get('/categories/{id}/modifier', [CategorieController::class, 'modifier'])->name('admin_categorie_modifier');
    Route::put('/categories/{id}', [CategorieController::class, 'mettre_a_jour'])->name('admin_categorie_mettre_a_jour');
    Route::delete('/categories/{id}', [CategorieController::class, 'supprimer'])->name('admin_categorie_supprimer');

    Route::get('/utilisateurs', [UtilisateurController::class, 'liste'])->name('admin_utilisateur_liste');
    Route::get('/utilisateurs/creer', [UtilisateurController::class, 'creer'])->name('admin_utilisateur_creer');
    Route::post('/utilisateurs', [UtilisateurController::class, 'enregistrer'])->name('admin_utilisateur_enregistrer');
    Route::get('/utilisateurs/{id}/modifier', [UtilisateurController::class, 'modifier'])->name('admin_utilisateur_modifier');
    Route::put('/utilisateurs/{id}', [UtilisateurController::class, 'mettre_a_jour'])->name('admin_utilisateur_mettre_a_jour');
    Route::delete('/utilisateurs/{id}', [UtilisateurController::class, 'supprimer'])->name('admin_utilisateur_supprimer');
});
