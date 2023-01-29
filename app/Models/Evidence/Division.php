<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    use HasFactory;

    protected $table = 'divisions';

    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public function storageLocations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StorageLocation::class,'division_id','id');
    }
}
