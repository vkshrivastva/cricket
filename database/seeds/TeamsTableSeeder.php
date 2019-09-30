<?php
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Team;
use Illuminate\Support\Str;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment()==='local' || App::environment()==='testing') {
            $countries = Country::all()->pluck('name');
            foreach ($countries as $country) {
                factory(Team::class,1)->create()->each(function ($team) use($country){
                    $team->name     = strtoupper($country);
                    $team->logo_uri = Str::snake($country) . '.png';
                    $team->save();
                });
            }
        }
    }
}
