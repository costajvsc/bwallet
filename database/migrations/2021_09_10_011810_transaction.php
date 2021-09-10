<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table){
            $table->bigIncrements('id_transaction');
            $table->string('title', 50);
            $table->decimal('amount');
            $table->enum('type', ['Entrada', 'Saída']);
            $table->enum('paymentMethod', ['Débito', 'Crédito', 'PIX', 'Especie']);
            $table->dateTime('occurrence_at');
            $table->foreignId('id_user');
            $table->foreignId('id_category');
            $table->boolean('deleted')->default(0);
            $table->dateTime('deleted_at')->nullable();
            $table->foreignId('id_piggy_bank')->nullable();
            $table->foreignId('id_payment')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
