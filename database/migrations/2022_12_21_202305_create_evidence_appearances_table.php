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
            $table->unsignedBigInteger('evidance_id')->comment('Вещественное доказательство');
            $table->foreign('evidance_id')
                ->references('id')->on('evidences')
                ->onDelete('cascade');
            $table->unsignedBigInteger('appearance_id')->comment('Вид упаковки');
            $table->foreign('appearance_id')
                ->references('id')->on('appearances')
                ->onDelete('cascade');
            $table->string('condition')->nullable()->comment('Состояние упаковки');
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
        Schema::dropIfExists('evidence_appearances');
    }
};
