<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('order')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('patners');
    }
}