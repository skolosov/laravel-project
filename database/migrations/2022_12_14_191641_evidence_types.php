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
        Schema::create(
            'evidence_types',
            function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('Наименование типа');
                $table->string('table_name')->comment('Имя таблицы');
                $table->string('model_namespace')->comment('Класс модели');
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
        Schema::dropIfExists('evidence_types');
    }
};
