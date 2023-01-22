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
            'evidences',
            function (Blueprint $table) {
                $table->id();
                $table->integer('resource_id')->index()->comment('Ссылка на строку в таблице ресурса');
                $table->string('resource_type')->index()->comment('Тип таблицы');
                $table->unsignedBigInteger('storage_location_id')->comment('Место хранения');
                $table->foreign('storage_location_id')
                    ->references('id')->on('storage_locations')
                    ->onDelete('cascade');

                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('evidences');
    }
};
