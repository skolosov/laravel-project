<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Appearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 */
class Appearance extends Model
{
    protected $table = 'appearances';

    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
}
