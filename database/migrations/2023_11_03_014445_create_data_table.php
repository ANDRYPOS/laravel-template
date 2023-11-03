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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name');
            $table->string('image');
            $table->bigInteger('qty');
            $table->integer('price');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('update_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
