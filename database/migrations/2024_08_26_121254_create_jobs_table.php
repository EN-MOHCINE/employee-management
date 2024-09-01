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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Colonne `id` comme clé primaire, auto-incrémentée
            $table->string('job_title'); // Colonne pour le titre du poste
            $table->decimal('min_salary', 10, 2)->nullable(); // Colonne pour le salaire minimum, nullable
            $table->decimal('max_salary', 10, 2)->nullable(); // Colonne pour le salaire maximum, nullable
            $table->timestamps(); // Colonnes pour `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
