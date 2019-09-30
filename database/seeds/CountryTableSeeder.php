<?php

use App\Models\Player;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
private $countries = [
        'India',
        'Australia',
        'England',
        'New Zealand',
        'Pakistan',
        'Sri Lanka',
        'South Africa',
        'Bangladesh',
        'West Indies',
        'Afghanistan'
    ];
    public function run()
    {
        if(App::environment()==='local' || App::environment()==='testing'){
            foreach($this->countries as $country){
                factory(Country::class,1)->create()->each(function($model) use($country){
                    $model->name    = $country;
                    $model->save();
                });
            }
        }
    }
}
