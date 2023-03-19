<?php


namespace App\Services;


use App\Models\Evidence\Appearance;

class EvidenceAppearanceService extends BaseService
{
    public function hasAppearance(mixed $appearance): Appearance
    {
        return Appearance::first(
            [
                'name' => $appearance
            ]
        );
    }
}
