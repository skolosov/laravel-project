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
            'other_evidences',
            function (Blueprint $table) {
                $table->id();
//                $table->integer('type')->comment('Вид');
                $table->string('name')->comment('Вид сущности');
                $table->integer('quantity')->nullable()->comment('Количество');
                $table->string('unit_name')->nullable()->comment('Единицы измерения');
                $table->double('amount',12,2)->nullable()->comment('Сумма');
                $table->string('number')->nullable()->comment('Номер');
                $table->string('designation')->nullable()->comment('Наименование');
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
        Schema::dropIfExists('other_evidences');
    }
};
