<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Player;
use App\Models\Team;
use App\Models\Country;

class CreateTablePlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable(Player::TABLE_NAME)) {
            Schema::create(Player::TABLE_NAME, function (Blueprint $table) {
                $table->increments(Player::ID);
                $table->string(Player::FIRST_NAME);
                $table->string(Player::LAST_NAME);
                $table->string(Player::IMAGE_URI)->nullable();
                $table->json(Player::HISTORY)->nullable();

                $table->unsignedTinyInteger(Player::JERSEY_NO);
                $table->unsignedSmallInteger(Player::COUNTRY_ID);
                $table->unsignedSmallInteger(Player::TEAM_ID);
                $table->nullableTimestamps();
                $table->softDeletes();

                $table->foreign(Player::COUNTRY_ID)
                    ->references(Country::ID)
                    ->on(Country::TABLE_NAME)
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');


                $table->foreign(Player::TEAM_ID)
                    ->references(Team::ID)
                    ->on(Team::TABLE_NAME)
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Player::TABLE_NAME, function (Blueprint $table) {
            Schema::dropIfExists(Player::TABLE_NAME);
        });
    }
}
