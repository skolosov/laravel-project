<?php

namespace App\Models\Evidence;


use Illuminate\Database\Eloquent\Model;
/**
 * Class Decision
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 */
class Decision extends Model
{
    protected $table = 'decisions';

    protected $fillable = [
        'name',
    ];
}
