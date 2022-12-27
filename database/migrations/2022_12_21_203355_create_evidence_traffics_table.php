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
        Schema::create('evidence_traffics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evidence_id')->comment('Вещественное доказательство');
            $table->foreign('evidence_id')
                ->references('id')->on('evidences')
                ->onDelete('cascade');
            $table->unsignedBigInteger('decision_id')->comment('Решение');
            $table->foreign('decision_id')
                ->references('id')->on('decisions')
                ->onDelete('cascade');
            $table->date('decision_date')->comment('Дата принятия решения');
            $table->unsignedBigInteger('storage_location_id')->comment('Место нахождения ВД');
            $table->foreign('storage_location_id')
                ->references('id')->on('storage_locations')
                ->onDelete('cascade');
            $table->unsignedBigInteger('staff_id')->comment('Сотрудник сдавший, получивший ВД');
            $table->foreign('staff_id')
                ->references('id')->on('staff')
                ->onDelete('cascade');
            $table->string('doc_number')->nullable()->comment('Номер документа');
            $table->date('doc_date')->nullable()->comment('Дата документа');
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
        Schema::dropIfExists('evidence_traffic');
    }
};
