<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('precommande_id')->constrained()->onDelete('cascade');
            $table->string('type_document');
            $table->string('chemin_fichier');
            $table->string('nom_original');
            $table->string('mime_type');
            $table->integer('taille');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}; 