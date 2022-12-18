<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transport
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property string engine_number
 * @property string registration_number
 * @property string brand
 * @property string color
 * @property string release_date
 * @property string created_at
 * @property string updated_at
 */
class Transport extends Model
{
    protected $table = 'transports';

    protected $fillable = [
        'type',
        'engine_number',
        'registration_number',
        'brand',
        'color',
        'release_date',
    ];
}
