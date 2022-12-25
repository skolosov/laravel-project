<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence\Alcohol;
use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Weapon;

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
        return $this->hasone(Alcohol::class, 'id', 'resource_id')->withDefault();;
    }

    public function drugs()
    {
        return $this->hasOne(Drug::class, 'id', 'resource_type')->withDefault();;
    }

    public function moneys()
    {
        return $this->hasOne(Money::class, 'id', 'resource_type')->withDefault();;
    }

    public function transports()
    {
        return $this->hasOne(Transport::class, 'id', 'resource_type')->withDefault();;
    }

    public function other_evidences()
    {
        return $this->hasOne(OtherEvidences::class, 'id', 'resource_type')->withDefault();;
    }


}
