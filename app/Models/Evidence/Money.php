<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    use HasFactory;

    protected $table = 'moneys';

    protected $fillable = [
        'type',
        'amount',
    ];
}
