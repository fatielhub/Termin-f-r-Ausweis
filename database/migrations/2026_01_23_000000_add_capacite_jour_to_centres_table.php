<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('centres', function (Blueprint $table) {
            $table->integer('capacite_jour')->default(0)->after('telephone');
        });
    }

    public function down()
    {
        Schema::table('centres', function (Blueprint $table) {
            $table->dropColumn('capacite_jour');
        });
    }
};
