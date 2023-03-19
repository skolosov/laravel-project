<?php


namespace App\Services;


use App\Models\Evidence\Appearance;
use App\Models\Evidence\Resources\Evidence;

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

    public function hasEvidence(mixed $evidence): Evidence
    {
        return Evidence::first(
            [
                'name' => $evidence
            ]
        );
    }
}
