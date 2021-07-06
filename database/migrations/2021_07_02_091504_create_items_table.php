<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->decimal('price');
            $table->integer('quantity');
            $table->integer('minimum_quantity');
            $table->boolean('auto_fill');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('manufacturer_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
