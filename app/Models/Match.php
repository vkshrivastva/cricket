<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-20
 * Time: 11:15
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Models;


class Match extends BaseEloquent
{
    /*
    |--------------------------------------------------------------------------
    | DATABASE TABLE NAME
    |--------------------------------------------------------------------------
    */


    const TABLE_NAME = 'matches';

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

    const ID       = 'id';
    const TEAM_ID     = 'name';
    const PLAYER_ID     = 'name';
    const RUN     = 'name';


    /**
     * Player Eloquent Constructor
     *   protected $table = self::TABLE_NAME;
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(self::TABLE_NAME);
        $this->timestamps=false;
    }

    /*
    |--------------------------------------------------------------------------
    | E L O Q U E N T   R E L A T I O N S H I P S
    |--------------------------------------------------------------------------
    */


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

}