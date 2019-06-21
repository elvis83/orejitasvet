<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResTipodocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_tipodocumento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipd_nombre',70)->unique();
            $table->string('slug')->unique();
            $table->string('tipd_abreviatura',3)->unique();
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
        Schema::dropIfExists('res_tipodocumento');
    }
}
