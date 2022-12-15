<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Money
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property double amount
 * @property string created_at
 * @property string updated_at
 */
class Money extends Model
{
    protected $table = 'moneys';

    protected $fillable = [
        'type',
        'amount',
    ];
}
