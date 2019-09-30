<?php

use App\Models\Country;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable(Country::TABLE_NAME)) {
            Schema::create(Country::TABLE_NAME, function (Blueprint $table) {
                $table->unsignedSmallInteger(Country::ID)->autoIncrement();
                $table->string(Country::NAME);
                $table->nullableTimestamps();
                $table->softDeletes();

                $table->unique(Country::NAME);
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
        Schema::table(Country::TABLE_NAME, function (Blueprint $table) {
            Schema::dropIfExists($table->getTable());
        });
    }
}
