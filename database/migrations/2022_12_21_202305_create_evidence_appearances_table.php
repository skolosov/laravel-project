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
        Schema::create('evidence_appearances', function (Blueprint $table) {
            $table->id();
            $table->integer('evidance_id')->comment('Вещественное доказательство');
            $table->foreign('evidance_id')->references('id')->on('evidences');
            $table->integer('appearance_id')->comment('Вид упаковки');
            $table->foreign('appearance_id')->references('id')->on('appearances');
            $table->string('condition')->nullable()->comment('Состояние упаковки');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidence_appearances');
    }
};
