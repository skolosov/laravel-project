<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Drug
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property double weight
 * @property string created_at
 * @property string updated_at
 */
class Drug extends Model
{
    protected $table = 'drugs';

    protected $fillable = [
        'type',
        'weight',
    ];
}
