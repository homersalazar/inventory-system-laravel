<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tran_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 5)->nullable();
            // $table->increments('sku');
            $table->string('user', 5)->nullable();
            $table->string('location', 5)->nullable();
            $table->string('types', 5)->nullable();
            $table->string('quantity', 5)->nullable();
            $table->string('mpr')->nullable();
            $table->string('unit_cost', 5)->nullable();
            $table->string('unit_refund', 5)->nullable();
            $table->string('drno', 5)->nullable();
            $table->string('received_by', 50)->nullable();
            $table->string('action', 5)->nullable();
            $table->string('remarks', 50)->nullable();
            $table->date('date_in');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tran_tbls');
    }
};
