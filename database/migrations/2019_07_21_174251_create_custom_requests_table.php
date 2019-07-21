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
            $table->string('ipd')->nullable();
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->string('address')->nullable();
            $table->integer('manufature_id')->nullable();
            $table->string('formula_number')->nullable();
            $table->string('revision')->nullable();
            $table->dateTime('date');
            $table->boolean('is_softgel')->default(0);
            $table->boolean('is_tablet')->default(0);
            $table->boolean('is_hardcapsule')->default(0);
            $table->string('size_type')->nullable();
            $table->string('color_logo')->nullable();
            $table->string('filling_wt')->nullable();
            $table->string('order');
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
