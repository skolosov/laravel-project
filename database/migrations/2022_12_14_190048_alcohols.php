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
            'alcohols',
            function (Blueprint $table) {
                $table->id();
//                $table->integer('type')->comment('Вид алкоголь');
                $table->string('name')->comment('Вид алкоголь');
                $table->integer('liter')->comment('Объем');
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
        Schema::dropIfExists('alcohols');
    }
};
