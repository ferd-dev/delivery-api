<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->string('category');
            $table->integer('stars');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('establishments');
    }
};
