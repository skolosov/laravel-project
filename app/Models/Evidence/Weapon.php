<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Weapon
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property string brand
 * @property string series
 * @property string number
 * @property string detail
 * @property string release_date
 * @property string created_at
 * @property string updated_at
 */
class Weapon extends Model
{
    protected $table = 'weapons';

    protected $fillable = [
        'type',
        'brand',
        'series',
        'number',
        'detail',
        'release_date',
    ];
}
