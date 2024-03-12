<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name')->unique();
            $table->string('slug');
            $table->string('game_link');
            $table->string('game_zip_file');
            $table->string('image');
            $table->longText('description');
            $table->longText('control')->nullable();
            $table->integer('participate')->nullable();
            $table->string('game_banner')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('game_fee')->nullable();
            $table->string('subscription_period')->nullable();
            $table->string('first_price')->nullable();
            $table->string('second_price')->nullable();
            $table->string('third_price')->nullable();
            $table->string('fourth_price')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('tournament_games');
    }
}
