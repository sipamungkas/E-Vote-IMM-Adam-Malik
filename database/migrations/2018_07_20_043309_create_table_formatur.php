<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFormatur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formaturs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('ttl');
            $table->string('jurusan');
            $table->string('visi');
            $table->string('image')->nullable();
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
        Schema::drop('formaturs');
    }
}
