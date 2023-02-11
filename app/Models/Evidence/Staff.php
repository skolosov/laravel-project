<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class EvidenceAppearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string fio
 * @property int post_id
 * @property int department_id
 * @property string phone
 * @property string created_at
 * @property string updated_at
 */

class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = [
        'fio',
        'post_id',
        'department_id',
        'phone'
    ];


}
