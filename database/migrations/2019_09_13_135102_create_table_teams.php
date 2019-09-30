<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Team;

class CreateTableTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable(Team::TABLE_NAME)) {
            Schema::create(Team::TABLE_NAME, function (Blueprint $table) {
                $table->unsignedSmallInteger(Team::ID)->autoIncrement();
                $table->string(Team::NAME);
                $table->string(Team::LOGO_URI);
                $table->timestamps();
                $table->softDeletes();
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
        Schema::table(Team::TABLE_NAME, function (Blueprint $table) {
            Schema::dropIfExists($table->getTable());
        });
    }
}
