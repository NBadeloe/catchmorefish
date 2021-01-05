<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('product_code');
            $table->string('product');
            $table->string('type');
            $table->unsignedBigInteger('lev_code');
            $table->double('inkoopprijs');
            $table->double('verkoopprijs');
            $table->timestamps();
            //specify foreign keys
            $table->foreign('lev_code')->references('lev_code')->on('leveranciers')->onDelete('cascade');
            //delete on cascade will delete child data if parent gets deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
