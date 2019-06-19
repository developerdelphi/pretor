<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('holder_id')->unsigned();
            $table->integer('persona_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->boolean('contract')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('holder_id')->references('id')->on('holders');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('process_id')->references('id')->on('processes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stakeholders');
    }
}
