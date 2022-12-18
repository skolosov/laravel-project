<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReferenceType
 * @package App\Models
 *
 * @property integer id
 * @property integer evidence_type_id
 * @property string name
 */
class ReferenceType extends Model
{
    protected $table = 'reference_types';

    protected $fillable = [
        'evidence_type_id',
        'type_name',
    ];

    public $timestamps = false;
}
