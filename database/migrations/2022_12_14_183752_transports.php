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
            'transports',
            function (Blueprint $table) {
                $table->id();
//                $table->integer('type')->nullable()->comment('Вид оружия');
                $table->string('name')->comment('Вид ТС');
                $table->string('engine_number')->nullable()->comment('Номер двигателя');
                $table->string('registration_number')->nullable()->comment('Регистрационный номер');
                $table->string('brand')->nullable()->comment('Марка');
                $table->string('color')->nullable()->comment('Цвет');
                $table->string('release_date')->nullable()->comment('Год выпуска');
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
        Schema::dropIfExists('transports');
    }
};
