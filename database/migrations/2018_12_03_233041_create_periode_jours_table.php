<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodeJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_jours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('day_id');
            $table->unsignedInteger('periode_id');
            $table->foreign('day_id')
                    ->references('id')
                    ->on('days')
                    ->onDelete('cascade');
            $table->foreign('periode_id')
                    ->references('id')
                    ->on('periodes')
                    ->onDelete('cascade');
            $table->boolean('isActive')->default(false);
            $table->unique(['periode_id', 'day_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periode_jours');
    }
}
