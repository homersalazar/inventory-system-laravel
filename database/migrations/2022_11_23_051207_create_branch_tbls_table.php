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
        Schema::create('branch_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('states')->nullable();
            $table->string('zip')->nullable();
            $table->string('stats');
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
        Schema::dropIfExists('branch_tbls');
    }
};
