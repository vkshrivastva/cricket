<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-16
 * Time: 07:48
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Models;


class Team extends BaseEloquent
{
    /*
    |--------------------------------------------------------------------------
    | DATABASE TABLE NAME
    |--------------------------------------------------------------------------
    */


    const TABLE_NAME = 'teams';

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
    const NAME     = 'name';
    const LOGO_URI = 'logo_uri';


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
    }

    /*
    |--------------------------------------------------------------------------
    | E L O Q U E N T   R E L A T I O N S H I P S
    |--------------------------------------------------------------------------
    */

    /**
     * A Category Has Many Players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
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

}