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
            $table->unsignedBigInteger('id',false);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamp('ordered_at')->useCurrent();
            $table->primary(['id','company_id','item_id','ordered_at']);
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamp('arrives_at')->nullable();
            $table->boolean('arrived')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();



            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
