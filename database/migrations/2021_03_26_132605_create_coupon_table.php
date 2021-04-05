<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
       // Schema::disableForeignKeyConstraints();
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();          
            $table->string('numero')->unique();
            $table->bigInteger('montant');
            $table->string('validité')->unique();
            $table->foreignId('personne_id')->references('id')->on('personnes')
          ->onDelete('cascade')->default(null);

           // $table->unsignedBigInteger('personne_id');
           // $table->foreignId('personne_id')
             //   ->references('id')->on('personnes')
               // ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('coupons');
    }
}
