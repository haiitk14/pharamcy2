<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customrequest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ipd');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->string('address');
            $table->integer('manufature_id');
            $table->string('formula_number');
            $table->string('revision');
            $table->date('date');
            $table->boolean('is_softgel')->default(0);
            $table->boolean('is_tablet')->default(0);
            $table->boolean('is_hardcapsule')->default(0);
            $table->string('size_type');
            $table->string('color_logo');
            $table->string('filling_wt');
            $table->string('order');
            $table->integer('salesorder_ingredients_id');
            $table->integer('salesorder_comments_id');
            $table->integer('create_by')->nullable();
            $table->integer('update_by')->nullable();
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
        Schema::dropIfExists('customrequest');
    }
}
