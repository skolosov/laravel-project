<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Division
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 */
class Division extends Model
{
    protected $table = 'divisions';

    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
}
