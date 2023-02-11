<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Department
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 * @property string created_at
 * @property string updated_at
 */
class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
    ];

    public function staffs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Staff::class,'department_id','id');
    }
}
