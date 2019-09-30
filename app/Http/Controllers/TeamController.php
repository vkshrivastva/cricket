<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-24
 * Time: 03:26
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Http\Controllers;


use App\Libraries\Fixture;
use App\Models\Team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TeamController extends Controller
{

    /**
     * This is the action method will return the list of Teams  and first team players
     * [listTeam description]
     * @return [type] [description]
     */
    public function listTeam(){
        try {
            $teams        = Team::all();
            $teamId       = $teams->first()->id;
            $selectedTeam = Team::find($teamId);
            $players      = $selectedTeam->players;

            return view('cricket.cricket', compact('teams', 'players', 'selectedTeam'));
        }
        catch (\Exception $exception){
            return view('cricket.cricket')->withErrors($exception->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFixtures(){
        try {
            $teams    = Team::all()->pluck(Team::NAME)->toArray();
            $schedule = (new Fixture($teams))->getSchedule();
            return view('cricket.cricket', compact('schedule'));
        }catch (\Exception $exception){
            return view('cricket.cricket', compact('schedule'));
        }
    }

}