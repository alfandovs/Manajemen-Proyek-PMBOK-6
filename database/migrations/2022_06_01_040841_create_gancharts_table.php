<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanchartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gancharts', function (Blueprint $table) {
            $table->id();
            $table->foreignid('project_id');
            $table->string('kegiatan');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('biaya')->nullable();
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
        Schema::dropIfExists('gancharts');
    }
}
