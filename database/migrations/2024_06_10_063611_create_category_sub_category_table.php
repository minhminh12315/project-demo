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
        Schema::create('category_sub_category', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('sub_category')->onDelete('cascade');
            $table->primary(['category_id', 'sub_category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_sub_category');
    }
};
