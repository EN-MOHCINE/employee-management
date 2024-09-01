<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // Colonne `id` comme clé primaire, auto-incrémentée
            $table->string('department_name'); // Colonne pour le nom du département
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('set null'); // Clé étrangère vers la table `users`, nullable, supprime le lien en cas de suppression
            $table->timestamps(); // Colonnes pour `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
