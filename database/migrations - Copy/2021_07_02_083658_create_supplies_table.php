<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id('company_id');
            $table->id('item_id');
            $table->timestamp('ordered_at');
            $table->timestamp('arrives_at');
            $table->boolean('arrived');
            $table->decimal('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('user_id');



            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
