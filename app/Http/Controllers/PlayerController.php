<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-24
 * Time: 03:27
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Http\Controllers;


use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{


    /**
     * This is an action method which will be called on teh ajax request to provide list of players for a provided team_id
     * [playerList description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public  function playerList(Request $request){
        if($request->has('team_id') && $request->ajax()){
            $selectedTeam=Team::find($request->team_id);
            $players=Team::find($request->team_id)->players;
            return view('cricket.player', compact('players','selectedTeam'));
        }
    }
}