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
        Schema::dropColumns('docs', ['area_id']);

        Schema::table('docs', function (Blueprint $table) {
            $table->integer('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('docs', ['status_id']);
        Schema::table('docs', function (Blueprint $table) {
            $table->integer('area_id')->nullable();
        });
    }
};
