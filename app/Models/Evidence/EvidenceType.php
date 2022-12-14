<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidenceType extends Model
{
    protected $table = 'evidence_types';

    protected $fillable = ['name', 'table_name', 'model_namespace'];

    public $timestamps = false;
}
