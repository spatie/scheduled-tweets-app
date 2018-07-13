<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account');
            $table->text('text');
            $table->timestamp('scheduled_for');
            $table->timestamp('tweeted_at')->nullable();
            $table->timestamps();
        });
    }
}
