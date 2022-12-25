<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alcohol
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property int liter
 * @property string created_at
 * @property string updated_at
 */
class Alcohol extends Model
{
    protected $table = 'alcohols';

    protected $fillable = [
        'type',
        'liter',
    ];


}
