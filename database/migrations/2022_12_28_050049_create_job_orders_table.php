<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('cob_card_id');
            $table->string('customer_name',100)->nullable();
            $table->string('job_details')->nullable();
            $table->string('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('colour')->nullable();
            $table->string('paper')->nullable();
            $table->string('finishing')->nullable();
            $table->string('packaging_details')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_by')->nullable();
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
        Schema::dropIfExists('job_orders');
    }
}
