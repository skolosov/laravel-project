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
                $table->integer('resource_id')->comment('Ссылка на строку в таблице ресурса');
                $table->integer('resource_type')->comment('Имя таблицы');
                $table->index(['resource_id', 'resource_type']);
                $table->foreign('resource_type')->references('id')->on('evidence_types');
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
        Schema::dropIfExists('evidences');
    }
};
