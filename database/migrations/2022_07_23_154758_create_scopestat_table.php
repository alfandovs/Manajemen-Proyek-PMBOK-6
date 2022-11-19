<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopestatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scopestat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->text('description');
            $table->text('deliverables');
            $table->text('criteria');
            $table->text('constrain');
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
        Schema::dropIfExists('scopestat');
    }
}
