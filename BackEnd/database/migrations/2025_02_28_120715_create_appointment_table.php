<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('annonce_id')->constrained('announcement')->onDelete('cascade');
            $table->dateTime('date_heure');
            $table->enum('statut', ['réservé', 'confirmé', 'annulé', 'terminé'])->default('réservé');
            
            // Vérifie si la table 'paiements' existe avant de créer la clé étrangère
            if (Schema::hasTable('paiements')) {
                $table->foreignId('paiement_id')->nullable()->constrained('paiements')->onDelete('set null');
            } else {
                $table->unsignedBigInteger('paiement_id')->nullable();
            }

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
