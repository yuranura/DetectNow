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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id();
            // $table->integer('test_id');
            // $table->integer('tipe_soal_id');
            $table->text('pertanyaan');
            $table->float('skor');
            $table->timestamps();
            $table->foreignId('test_id')->constrained('test');
            // $table->foreignId('tipe_soal_id')->constrained('tipe_soal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
};
