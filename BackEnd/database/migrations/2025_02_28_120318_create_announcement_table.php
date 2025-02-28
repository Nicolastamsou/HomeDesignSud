<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcement', function (Blueprint $table) { 
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->enum('type', ['coaching', 'atelier']);
            $table->decimal('prix', 10, 2);
            $table->foreignId('createur_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('annonces'); 
    }
};
