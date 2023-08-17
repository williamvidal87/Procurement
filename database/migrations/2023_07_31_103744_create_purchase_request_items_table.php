<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insert_procured_id')->nullable();
            $table->unsignedBigInteger('quarter_id')->nullable();
            $table->string('item_no')->nullable();
            $table->string('unit_measure');
            $table->longText('item_description');
            $table->string('qty');
            $table->string('estimated_cost');
            
            $table->foreign('insert_procured_id')->references('id')->on('insert_procureds');
            $table->foreign('quarter_id')->references('id')->on('quarters');
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
        Schema::dropIfExists('purchase_request_items');
    }
}
