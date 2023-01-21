<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence\StorageLocation;
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

    public function storage_locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('StorageLocation');
    }
}
