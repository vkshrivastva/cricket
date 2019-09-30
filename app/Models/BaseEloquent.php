<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-13
 * Time: 10:23
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseEloquent extends Model
{
    use SoftDeletes;
    /**
     * This table property will be used through out the application to refer the table field name deleted_at
     * where ever is required
     */
    const DELETED_AT = 'deleted_at';
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];
    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [self::DELETED_AT];
}