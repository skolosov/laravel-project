<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'storage_locations',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('evidance_id')->comment('Вещественное доказательство');
                $table->foreign('evidance_id')
                    ->references('id')->on('evidences')
                    ->onDelete('cascade');
                $table->unsignedBigInteger('division_id')->comment('Подразделение в котором хранится вещественное доказательство');
                $table->foreign('division_id')
                    ->references('id')->on('divisions')
                    ->onDelete('cascade');
                $table->string('name')->comment('Место хранения');

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_locations');
    }
};
