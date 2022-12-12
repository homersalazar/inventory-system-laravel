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
        Schema::create('parts_lists', function (Blueprint $table) {
            $table->id();
            // $table->increments('skus');
            $table->string('sku', 5)->nullable();
            $table->string('b_id', 5)->nullable();
            $table->string('details', 50)->nullable();
            $table->string('partno', 25)->nullable();
            $table->string('serialno', 25)->nullable();
            $table->string('end_user', 25)->nullable();
            $table->string('u_id', 5)->nullable();
            $table->string('r_id', 5)->nullable();
            $table->string('min_stock', 5)->nullable();
            $table->string('comments', 50)->nullable();
            $table->string('stats', 5)->nullable();
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
        Schema::dropIfExists('parts_lists');
    }
};
