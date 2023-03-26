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
            'criminal_cases',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('evidence_id')->comment('Вещественное доказательство');
                $table->foreign('evidence_id')
                    ->references('id')->on('evidences')
                    ->onDelete('cascade');
                $table->string('number_ud')->comment('Номер УД');
                $table->date('date_ud')->comment('Дата возбуждения УД');

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
        Schema::dropIfExists('criminal_cases');
    }
};
