<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->boolean('actif')->default(true);
            $table->time('heure_ouverture');
            $table->time('heure_fermeture');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('centres');
    }
}; 