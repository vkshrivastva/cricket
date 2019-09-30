<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-13
 * Time: 10:23
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Models;


use App\Models\ORM\Wincredible\Game;
use App\Models\ORM\Wincredible\Question;

class Player extends BaseEloquent
{
    /*
    |--------------------------------------------------------------------------
    | DATABASE TABLE NAME
    |--------------------------------------------------------------------------
    */


    const TABLE_NAME = 'players';

    /*
    |--------------------------------------------------------------------------
    | TABLE COLUMNS
    |--------------------------------------------------------------------------
    */

    /**
     * This section contains the Table column definition
     * No need to define the following column. It is already defined in the Eloquent Model as
     * CREATED_AT = 'created_at'
     * UPDATED_AT = 'updated_at'
     *
     */

    const ID         = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME  = 'last_name';
    const IMAGE_URI  = 'image_uri';
    const HISTORY  = 'history';
    const JERSEY_NO  = 'jersey_no';
    const COUNTRY_ID = 'country_id';
    const TEAM_ID = 'team_id';


    /**
     * Player Eloquent Constructor
     *   protected $table = self::TABLE_NAME; // this need to be implemented at later if see the constructor is
     *   required or not
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(self::TABLE_NAME);
    }

    /*
    |--------------------------------------------------------------------------
    | E L O Q U E N T   R E L A T I O N S H I P S
    |--------------------------------------------------------------------------
    */

    /**
     * A Category Has Many Games
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games()
    {
        return $this->hasMany(Game::class);
    }

    /**
     * A Category Belongs To Many Questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(
            Question::class,
            'wincredible_categories_questions',
            'category_id',
            'question_id'
        )->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Q U E R Y   S C O P E S
    |--------------------------------------------------------------------------
    */

    /**
     * @param        $query
     * @param string $name
     *
     * @return mixed
     */
    public function scopeName($query, string $name)
    {
        return $query->where(self::NAME, $name);
    }

    /**
     * @param        $query
     * @param string $state
     *
     * @return mixed
     */
    public function scopeState($query, string $state)
    {
        return $query->where(self::CLUB_STATE, $state);
    }

}