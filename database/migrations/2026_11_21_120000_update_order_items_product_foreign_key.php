<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('nom_produit')->nullable()->after('product_id');
        });

        // recopie le nom des produits pour les commandes déjà existantes
        DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->update(['order_items.nom_produit' => DB::raw('products.nom')]);

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->foreignId('product_id')->nullable()->change();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('nom_produit');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable(false)->change();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
