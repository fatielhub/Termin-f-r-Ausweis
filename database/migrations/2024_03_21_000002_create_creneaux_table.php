<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('creneau', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->integer('capacite')->default(1);
            $table->integer('places_occupees')->default(0);
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('creneau');
    }
}; 