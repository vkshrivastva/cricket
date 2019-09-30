<?php
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;
use App\Models\Country;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment()==='local' || App::environment()==='testing'){
            $teamList= Team::all()->pluck('id')->toArray();
            $countryList= Country::all()->pluck('id')->toArray();
            foreach($teamList as $teamId){
                factory(Player::class,11)->create()->each(function($player) use($teamId, $countryList){
                    $player->image_uri=rand(1,12).'.jpg';
                    $player->team_id=$teamId;
                    $player->country_id=$teamId;
                    $player->save();
                });
            }
        }
    }
}
