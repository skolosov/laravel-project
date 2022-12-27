<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    use HasFactory;

    protected $table = 'alcohols';

    protected $fillable = [
        'type',
        'liter',
    ];
}
