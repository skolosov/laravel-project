<?php


namespace App\Services;


use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;

class EvidenceService extends BaseService
{
    public function getType(int $typeEvidence = 1): string
    {
        return match ($typeEvidence) {
            2 => Drug::class,
            3 => Money::class,
            4 => Transport::class,
            5 => Weapon::class,
            6 => OtherEvidence::class,
            default => Alcohol::class,
        };
    }
}
