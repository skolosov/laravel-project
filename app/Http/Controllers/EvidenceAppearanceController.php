<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidenceAppearance\EvidenceAppearanceIndexRequest;
use App\Http\Requests\EvidenceAppearance\EvidenceAppearanceStoreRequest;
use App\Http\Requests\EvidenceAppearance\EvidenceAppearanceUpdateRequest;
use App\Models\Evidence\EvidenceAppearance;
use App\Services\EvidenceAppearanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvidenceAppearanceController extends Controller
{
    public function __construct(private EvidenceAppearanceService $services)
    {
    }

    public function index(EvidenceAppearanceIndexRequest $request)
    {
        return $this->services->index(EvidenceAppearance::class, ['evidence', 'appearance'], $request->get('filter'));
    }

    public function show(Request $request, int $id)
    {
        return $this->services->show(EvidenceAppearance::class, $id, ['evidence', 'appearance']);
    }

    public function store(EvidenceAppearanceStoreRequest $request)//
    {
        $data = $request->all();
        DB::beginTransaction();
        $evidence_appearance = $this->services->store(
            EvidenceAppearance::class,
            $data,
            ['evidence', 'appearance']
        );
        DB::commit();
        return $evidence_appearance;
    }

    public function update(EvidenceAppearanceUpdateRequest $request, int $id)
    {
        return $this->services->update(EvidenceAppearance::class, $id, $request->all(), ['evidence', 'appearance']);
    }

    public function destroy(int $id)
    {
        $this->services->destroy(EvidenceAppearance::class, $id);
    }

}
