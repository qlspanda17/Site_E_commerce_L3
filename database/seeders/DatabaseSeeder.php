<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@fleuriste.fr',
            'password' => Hash::make('mdp'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'client@fleuriste.fr',
            'password' => Hash::make('mdp'),
            'role' => 'user'
        ]);

        $bouquets = Categorie::create([
            'nom' => 'Bouquets',
            'description' => 'Bouquets de fleurs fraîches pour toutes les occasions'
        ]);

        $interieur = Categorie::create([
            'nom' => 'Plantes d\'intérieur',
            'description' => 'Plantes vertes et fleuries pour la maison'
        ]);

        $tropicales = Categorie::create([
            'nom' => 'Fleurs tropicales',
            'description' => 'Orchidées, anthuriums, hibiscus et autres fleurs exotiques'
        ]);

        $mariage = Categorie::create([
            'nom' => 'Mariage',
            'description' => 'Bouquets et compositions pour votre mariage'
        ]);

       

        $roses = Product::create([
            'nom' => 'Bouquet de roses rouges',
            'description' => '12 roses rouges à longue tige',
            'prix' => 29.90,
            'stock' => 25
        ]);
        $roses->categories()->attach([$bouquets->id]);

        $champetre = Product::create([
            'nom' => 'Bouquet champêtre',
            'description' => 'Marguerites, tournesols et fleurs des champs',
            'prix' => 24.90,
            'stock' => 20,
            'image' => 'images/produits/bouquet_champêtre.webp'
        ]);
        $champetre->categories()->attach([$bouquets->id]);

        $mariee = Product::create([
            'nom' => 'Bouquet de mariée',
            'description' => 'Roses blanches et pivoines, attaché à la main',
            'prix' => 65.00,
            'stock' => 8,
            'image' => 'images/produits/bouquet_mariée.webp'
        ]);
        $mariee->categories()->attach([$bouquets->id, $mariage->id]);

        $orchidee = Product::create([
            'nom' => 'Orchidée Phalaenopsis',
            'description' => 'Orchidée en pot à floraison longue durée',
            'prix' => 22.90,
            'stock' => 18,
            'image' => 'images/produits/orchidee_papillon.webp'
        ]);
        $orchidee->categories()->attach([$interieur->id, $tropicales->id]);

        $anthurium = Product::create([
            'nom' => 'Anthurium rouge',
            'description' => 'Fleur tropicale en pot, facile d\'entretien',
            'prix' => 19.90,
            'stock' => 15,
            'image' => 'images/produits/anthurium.webp'
        ]);
        $anthurium->categories()->attach([$interieur->id, $tropicales->id]);

        $hibiscus = Product::create([
            'nom' => 'Hibiscus',
            'description' => 'Arbuste à grandes fleurs colorées',
            'prix' => 15.50,
            'stock' => 30,
            'image' => 'images/produits/hibiscus.webp'
        ]);
        $hibiscus->categories()->attach([$tropicales->id]);

        $ficus = Product::create([
            'nom' => 'Ficus',
            'description' => 'Plante verte d\'intérieur résistante',
            'prix' => 27.00,
            'stock' => 12,
            'image' => 'images/produits/ficus.webp'
        ]);
        $ficus->categories()->attach([$interieur->id]);

    }
}