<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToTypeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_users', function (Blueprint $table) {
            $table->unsignedInteger('nbreHeure')->default(0);
            $table->boolean('autoriseAComposer')->default(false);
            $table->string('groupe')->nullable();
            $table->string('equipe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_users', function (Blueprint $table) {
            //
        });
    }
}
