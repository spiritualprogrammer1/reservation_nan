<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToUserMac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_macs', function (Blueprint $table) {
            $table->unsignedInteger('periode_jour_id');
            $table->boolean('isActive')->default(false);
            $table->foreign('periode_jour_id')
                    ->references('id')
                    ->on('periode_jours')
                    ->onDelete('cascade');
            $table->unique(['periode_jour_id', 'user_id', 'mac_id']);
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
