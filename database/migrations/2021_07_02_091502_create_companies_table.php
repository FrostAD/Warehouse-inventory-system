<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
            $table->string('address', 200);
            $table->string('telephone', 20);
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
}
