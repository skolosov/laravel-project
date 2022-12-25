<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int resource_id
 * @property int resource_type
 * @property string created_at
 * @property string updated_at
 */
class Evidence extends Model
{
    protected $table = 'evidences';

    protected $fillable = [
        'resource_id',
        'resource_type',
    ];


    public function alcohols()
    {
        return $this->hasOne(Alcohol::class, 'id', 'resource_id');
    }

    public function drugs()
    {
        return $this->hasOne(Drug::class, 'id', 'resource_type');
    }

    public function moneys()
    {
        return $this->hasOne(Money::class, 'id', 'resource_type');
    }

    public function transports()
    {
        return $this->hasOne(Transport::class, 'id', 'resource_type');
    }

    public function other_evidences()
    {
        return $this->hasOne(OtherEvidences::class, 'id', 'resource_type');
    }


}
