<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categorie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorie_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id') ->constrained('products') ->onDelete('cascade');
            $table->foreignId('categorie_id') ->constrained('categories') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie_product') ->constrained('categories') ->onDelete('cascade');
    }
};
