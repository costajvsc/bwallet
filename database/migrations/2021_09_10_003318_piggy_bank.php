<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PiggyBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piggies_bank', function (Blueprint $table){
            $table->bigIncrements('id_piggy_bank');
            $table->string('title', 50);
            $table->dateTime('milestone')->nullable();
            $table->string('color', 6)->nullable();
            $table->string('icon', 15)->nullable();
            $table->boolean('deleted')->default(0);
            $table->dateTime('deleted_at')->nullable();
            $table->foreignId('id_user');
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
        Schema::dropIfExists('piggies_bank');
    }
}
