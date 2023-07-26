<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->default(1);
            $table->boolean('expired')->default(0);

            $table->foreignId('product_id')->constrained('products')
            ->cascadeOnDelete()
            ->cascadeOnDelete();

            $table->foreignId('user_id')->constrained('users')
            ->cascadeOnDelete()
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
