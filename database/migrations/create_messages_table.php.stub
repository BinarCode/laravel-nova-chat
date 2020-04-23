<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('from_id');
            $table->foreignId('to_id');
            $table->text('body')->nullable();
            $table->dateTime('seen_at')->nullable();

            $table->nullableTimestamps();

            $table->foreign('from_id')
                ->on('users')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('to_id')
                ->on('users')
                ->references('id')
                ->cascadeOnDelete();
    });
}

public function down()
    {
        Schema::dropIfExists('messages');
    }
}
