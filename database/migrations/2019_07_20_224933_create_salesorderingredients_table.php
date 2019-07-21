<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesorderingredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesorder_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customrequest_id');
            $table->integer('ingredient_id');
            $table->double('per_serving');
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
        Schema::dropIfExists('salesorder_ingredients');
    }
}
