<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertProcuredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insert_procureds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('item_category_id')->nullable();
            $table->year('year_budget');
            
            $table->decimal('first_quarter', 11, 2)->nullable();
            $table->decimal('second_quarter', 11, 2)->nullable();
            $table->decimal('third_quarter', 11, 2)->nullable();
            $table->decimal('fourth_quarter', 11, 2)->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_category_id')->references('id')->on('item_categories');
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
        Schema::dropIfExists('insert_procureds');
    }
}
