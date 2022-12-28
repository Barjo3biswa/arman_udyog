<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_cards', function (Blueprint $table) {
            $table->id();
            $table->string('job_details',255);
            $table->integer('customer_id');
            $table->date('job_date');
            $table->string('design_by',20)->nullable();
            $table->string('colour',255)->nullable();
            $table->string('sub_coloue',20)->nullable();
            $table->string('ctp_size',255)->nullable();
            $table->string('ctp_type',50)->nullable();
            $table->string('paper_type',255)->nullable();
            $table->string('paper_supplied_by',50)->nullable();
            $table->string('gsm',50)->nullable();
            $table->string('paper_cutting_size',255)->nullable();
            $table->string('press_machine_type',255)->nullable();
            $table->string('pages',255)->nullable();
            $table->string('total_forma',255)->nullable();
            $table->integer('ss_or_bb')->nullable();
            $table->string('juri_forma',255)->nullable();
            $table->string('wastage_qty_of_paper',255)->nullable();
            $table->string('total_impression',255)->nullable();
            $table->boolean('lamination')->nullable();
            $table->boolean('uv')->nullable();
            $table->boolean('punching')->nullable();
            $table->boolean('center_printing')->nullable();
            $table->boolean('perfect')->nullable();
            $table->boolean('perforation')->nullable();
            $table->string('sl_no',100)->nullable();
            $table->string('mounting',50)->nullable();
            $table->longText('Others')->nullable();
            $table->string('date_of_printing',50)->nullable();
            $table->string('date_of_delivery',50)->nullable();
            $table->string('delivery_by',50)->nullable();
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
        Schema::dropIfExists('job_cards');
    }
}
