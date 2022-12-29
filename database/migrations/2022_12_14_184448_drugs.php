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
            'drugs',
            function (Blueprint $table) {
                $table->id();
//                $table->integer('type')->comment('Вид наркотиков');
                $table->string('name')->comment('Вид наркотиков');
                $table->double('weight',12,5)->comment('Вес наркотиков');
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
        Schema::dropIfExists('drugs');
    }
};
