<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_update', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('employe_id');
            $table->foreignId('client_id');
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->integer('biaya')->nullable();
            $table->string('tujuan');
            $table->string('deskripsi');
            $table->string('saran')->nullable();
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
        Schema::dropIfExists('project_update');
    }
}
