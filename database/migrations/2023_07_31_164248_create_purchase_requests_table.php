<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('insert_procured_id')->nullable();
            $table->string('purchase_request_number')->nullable();
            $table->unsignedBigInteger('request_category_id')->nullable();
            $table->unsignedBigInteger('quarter_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->date('purchase_request_date')->nullable();
            $table->text('document')->nullable();
            $table->string('remark')->nullable();
            $table->string('purpose')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('insert_procured_id')->references('id')->on('insert_procureds');
            $table->foreign('request_category_id')->references('id')->on('request_categories');
            $table->foreign('quarter_id')->references('id')->on('quarters');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('purchase_requests');
    }
}
