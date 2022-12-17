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
            'weapons',
            function (Blueprint $table) {
                $table->id();
                $table->integer('type')->comment('Вид оружия');
                $table->string('brand')->nullable()->comment('Марка оружия');
                $table->string('series')->nullable()->comment('Серия оружия');
                $table->string('number')->nullable()->comment('Номер оружия');
                $table->string('detail')->nullable()->comment('Деталь оружия');
                $table->string('release_date')->nullable()->comment('Год выпуска оружия');
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
        Schema::dropIfExists('weapons');
    }
};
