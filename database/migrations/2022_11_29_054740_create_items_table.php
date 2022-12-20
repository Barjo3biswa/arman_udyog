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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code',50);
            $table->string('item_name',100);
            $table->integer('product_id');
            $table->integer('dimension_id')->nullable();
            $table->integer('thickess_id')->nullable();
            $table->integer('unit_id');
            $table->string('unit_name');
            $table->float('opening_quantity');
            $table->float('closing_quantity');
            $table->float('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
