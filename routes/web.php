<?php

use Illuminate\Support\Facades\Route;
use App\Models\Parcel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\ColisController ;

use App\Http\Controllers\ProduitAdminController;

use App\Http\Controllers\CategorieController ;

use App\Http\Controllers\AdminController ;

use App\Http\Controllers\ConnexionController ;

use App\Http\Controllers\InscriptionController ;

use App\Http\Controllers\PanierController ;









Route::get('/', [WelcomeController::class,'welcome_index'])->name('welcome_index');

Route::get('/register', [ColisController::class,'register_index'])->name('register_index');

Route::post('/register', [ColisController::class,'register_new_parcel'])->name('register_new_parcel');

Route::get('/inscription', [InscriptionController::class,'inscription_index'])->name('inscription_index');
Route::post('/inscription', [InscriptionController::class,'inscription_store'])->name('inscription_store');


Route::get('/connexion', [ConnexionController::class,'connexion_index'])->name('connexion');
Route::post('/connexion', [ConnexionController::class,'connexion_store'])->name('connexion');
Route::post('/deconnexion', [ConnexionController::class,'deconnexion'])->name('deconnexion');

Route::get('/produit_admin',[ProduitAdminController::class,"produit"]) ;
Route::post('/produit_admin',[ProduitAdminController::class,"traiterProduit"]) ;
Route::get("/liste_produits",[ProduitAdminController::class,"listeProduits"]) ;
Route::get('/modifier_produit/{id}',[ProduitAdminController::class,'modifierProduit']); 
Route::post('/modifier_produit/{id}',[ProduitAdminController::class,'majProduit']); 
Route::get('/supprimer_produit/{id}',[ProduitAdminController::class,'supprimerProduit']); 


Route::get("/categorie",[CategorieController::class,"categorie"]) ; 
Route::post("/categorie",[CategorieController::class,"traiterCategorie"]) ; 
Route::get("/liste_categories",[CategorieController::class,"listeCategories"]) ;
Route::get('/modifier_categorie/{id}',[CategorieController::class,'modifierCategorie']);
Route::post('/modifier_categorie/{id}',[CategorieController::class,'majCategorie']);
Route::get('/supprimer_categorie/{id}',[CategorieController::class,'supprimerCategorie']);

Route::get('/admin',[AdminController::class,'admin']) ;

Route::get('/panier',[PanierController::class,'panier_index']) ;

Route::get('/ajouter_panier/{id}',[PanierController::class,'ajouter']) ;

Route::get('/vider_panier', function()
{
    session()->forget('panier');

    return "Panier vidé";
});










