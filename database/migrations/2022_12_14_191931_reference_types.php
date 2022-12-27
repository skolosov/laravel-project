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
        Schema::create('reference_types', function (Blueprint $table) {
            $table->id();
            $table->integer('evidence_type_id')->index();
            $table->foreign('evidence_type_id')
                ->on('evidence_types')
                ->references('id')
                ->cascadeOnDelete();
            $table->string('type_name')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_types');
    }
};
