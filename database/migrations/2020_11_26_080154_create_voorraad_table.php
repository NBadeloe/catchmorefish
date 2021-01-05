<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoorraadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voorraad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('locatie_code')->constrained();
            $table->unsignedBigInteger('product_code')->constrained();
            $table->integer('aantal');
            //specify foreign keys
            $table->foreign('locatie_code')->references('locatie_code')->on('locaties')->onDelete('cascade');
            $table->foreign('product_code')->references('product_code')->on('artikel')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('voorraad');
    }
}
