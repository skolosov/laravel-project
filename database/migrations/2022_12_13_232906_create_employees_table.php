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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fio')->comment('ФИО должностного лица');
            $table->integer('post_id')->comment('Должность');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('department_id')->comment('Служба\Подразделение\Организация');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('phone')->comment('Телефон должностного лица');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
