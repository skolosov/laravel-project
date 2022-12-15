<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvidenceType
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 * @property string table_name
 * @property string model_namespace
 */
class EvidenceType extends Model
{
    protected $table = 'evidence_types';

    protected $fillable = [
        'name',
        'table_name',
        'model_namespace'
    ];

    public $timestamps = false;
}
