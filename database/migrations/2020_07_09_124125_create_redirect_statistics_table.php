<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     * Allow actions for FK: CASCADE | SET NULL | NO ACTION | RESTRICT
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redirect_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('referrer')->nullable();
            $table->integer('redirect_id')->nullable();
            $table->timestamps();
            $table->foreign('redirect_id')->references('id')->on('redirects')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redirect_statistics');
    }
}
