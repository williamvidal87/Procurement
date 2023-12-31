<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insert_budget_id')->nullable();
            $table->unsignedBigInteger('quarter_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('item_no');
            $table->string('unit_measure');
            $table->longText('item_description');
            $table->string('qty');
            $table->string('estimated_cost');
            $table->unsignedBigInteger('status_id')->nullable();
            
            $table->foreign('insert_budget_id')->references('id')->on('insert_budgets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('item_categories');
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
        Schema::dropIfExists('office_items');
    }
}
