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

    public function getTypeID(string $typeClass = Alcohol::class): int
    {
        return match ($typeClass) {
            Drug::class => 2,
            Money::class => 3,
            Transport::class => 4,
            Weapon::class => 5,
            OtherEvidence::class => 6,
            default => 1,
        };
    }

    public function getTypes(): array
    {
        return [
            ['id' => 1, 'model' => Alcohol::class, 'name' => Alcohol::MODEL_LABEL],
            ['id' => 2, 'model' => Drug::class, 'name' => Drug::MODEL_LABEL],
            ['id' => 3, 'model' => Money::class, 'name' => Money::MODEL_LABEL],
            ['id' => 4, 'model' => Transport::class, 'name' => Transport::MODEL_LABEL],
            ['id' => 5, 'model' => Weapon::class, 'name' => Weapon::MODEL_LABEL],
            ['id' => 6, 'model' => OtherEvidence::class, 'name' => OtherEvidence::MODEL_LABEL],
        ];
    }
}
