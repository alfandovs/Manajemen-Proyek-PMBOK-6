<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->text('requiremens');
            $table->text('categories');
            $table->text('prioriti');
            $table->text('treacebility');
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
        Schema::dropIfExists('scope');
    }
}
