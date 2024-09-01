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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Colonne `id` comme clé primaire, auto-incrémentée
            $table->string('first_name'); // Colonne pour le prénom de l'employé
            $table->string('last_name'); // Colonne pour le nom de famille de l'employé
            $table->string('email')->unique(); // Colonne pour l'email de l'employé, unique
            $table->string('phone_number')->nullable(); // Colonne pour le numéro de téléphone, nullable
            $table->date('hire_date'); // Colonne pour la date de recrutement
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade'); // Clé étrangère vers la table `jobs`
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null'); // Clé étrangère vers la table `departments`, nullable
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Clé étrangère vers la table `users`, nullable
            $table->decimal('salary', 10, 2); // Colonne pour le salaire de l'employé
            $table->foreignId('manager_id')->nullable()->constrained('employees')->onDelete('set null'); // Clé étrangère vers la table `employees` pour le manager, nullable
            $table->timestamps(); // Colonnes pour `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empolyees');
    }
};
