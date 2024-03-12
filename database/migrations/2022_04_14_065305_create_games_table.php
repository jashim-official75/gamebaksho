<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name')->unique();
            $table->text('game_description');
            $table->string('game_thumbnail')->unique();
            $table->string('game_banner')->unique();
            $table->string('game_file')->unique();
            $table->string('zip_file_name')->unique()->nullable();
            $table->integer('is_free')->default(1);
            $table->integer('is_exclusive')->default(1);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
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
        Schema::dropIfExists('games');
    }
}
