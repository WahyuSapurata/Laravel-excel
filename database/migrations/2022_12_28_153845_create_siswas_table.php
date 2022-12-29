<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable();
            $table->string('meetpath')->nullable();
            $table->string('federation')->nullable();
            $table->string('date')->nullable();
            $table->string('meetcountry')->nullable();
            $table->string('meetstate')->nullable();
            $table->string('meettown')->nullable();
            $table->string('meetname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
