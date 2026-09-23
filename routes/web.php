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
use App\Http\Controllers\MotDePasseController;


//PUBLIC
Route::get('/', [WelcomeController::class, 'welcome_index'])->name('welcome_index');

Route::get('/produits', [ProduitController::class, 'produit_index'])->name('produit_index');
Route::get('/produits/{product}', [ProduitController::class, 'produit_afficher'])->name('produit_afficher');

Route::get('/panier', [PanierController::class, 'panier_index'])->name('panier_index');
Route::get('/ajouter_panier/{id}', [PanierController::class, 'ajouter'])->name('ajouter');
Route::get('/retirer_panier/{id}', [PanierController::class, 'retirer'])->name('retirer');
Route::view('/terme', 'terme')->name('terme');


//VISITEURS
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [InscriptionController::class, 'inscription_index'])->name('inscription_index');
    Route::post('/inscription', [InscriptionController::class, 'inscription_store'])->name('inscription_store');
    Route::get('/connexion', [ConnexionController::class, 'connexion_index'])->name('connexion_index');
    Route::post('/connexion', [ConnexionController::class, 'connexion_store'])->name('connexion_store');
    Route::get('/mot-de-passe-oublie', [MotDePasseController::class, 'index'])->name('mot_de_passe_oublie');
    Route::post('/mot-de-passe-oublie', [MotDePasseController::class, 'envoyer'])->name('mot_de_passe_envoyer');
    Route::get('/reinitialiser-mot-de-passe/{token}', [MotDePasseController::class, 'reset'])->name('mot_de_passe_reset');
    Route::post('/reinitialiser-mot-de-passe', [MotDePasseController::class, 'maj_mot_de_passe'])->name('mot_de_passe_maj');
});


//CONNECTÉS
Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('deconnexion');
    Route::post('/commande', [CommandeController::class, 'valider'])->name('commande_valider');
    Route::get('/mes_commandes', [CommandeController::class, 'index'])->name('commandes_index');
    Route::delete('/supprimer_compte', [ConnexionController::class, 'supprimer_compte'])->name('supprimer_compte');
    Route::get('/commande', [CommandeController::class, 'formulaire'])->name('commande_formulaire');
    Route::post('/commande', [CommandeController::class, 'valider'])->name('commande_valider');

    });


//ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    Route::get('/produit_admin', [ProduitAdminController::class, 'produit']);
    Route::post('/produit_admin', [ProduitAdminController::class, 'traiter_produit']);
    Route::get('/liste_produits', [ProduitAdminController::class, 'liste_produits']);
    Route::get('/modifier_produit/{id}', [ProduitAdminController::class, 'modifier_produit']);
    Route::put('/modifier_produit/{id}', [ProduitAdminController::class, 'maj_produit']);
    Route::delete('/supprimer_produit/{id}', [ProduitAdminController::class, 'supprimer_produit']);

    Route::get('/categorie', [CategorieController::class, 'categorie']);
    Route::post('/categorie', [CategorieController::class, 'traiter_categorie']);
    Route::get('/liste_categories', [CategorieController::class, 'liste_categories']);
    Route::get('/modifier_categorie/{id}', [CategorieController::class, 'modifier_categorie']);
    Route::put('/modifier_categorie/{id}', [CategorieController::class, 'maj_categorie']);
    Route::delete('/supprimer_categorie/{id}', [CategorieController::class, 'supprimer_categorie']);
});