<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class EvidenceAppearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int evidance_id
 * @property string name
 * @property int division_id
 * @property string created_at
 * @property string updated_at
 */
class StorageLocation extends Model
{
    protected $table = 'storage_locations';

    protected $fillable = [
        'evidance_id',
        'name',
        'division_id',
    ];
}
