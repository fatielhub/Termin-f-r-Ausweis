<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('precommandes', function (Blueprint $table) {
            $table->id();
            $table->string('code_suivi')->unique();
            $table->enum('type_demande', ['nouvelle', 'renouvellement']);
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('cin')->nullable();
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->string('adresse');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email');
            $table->foreignId('centre_id')->constrained();
            $table->foreignId('creneau_id')->constrained('creneau');
            $table->enum('statut', ['en_attente', 'validee', 'rejetee', 'annulee'])->default('en_attente');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('precommandes');
    }
}; 