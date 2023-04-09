<?php

namespace App\Http\Controllers;


use App\Http\Requests\EvidenceTraffic\EvidenceTrafficIndexRequest;
use App\Http\Requests\EvidenceTraffic\EvidenceTrafficShowRequest;
use App\Http\Requests\EvidenceTraffic\EvidenceTrafficStoreRequest;
use App\Http\Requests\EvidenceTraffic\EvidenceTrafficUpdateRequest;
use App\Models\Evidence\EvidenceTraffic;
use App\Services\EvidenceTrafficService;

class EvidenceTrafficController extends Controller
{
    public function __construct(private EvidenceTrafficService $service)
    {
    }

    /**
     * @param EvidenceTrafficIndexRequest $request
     * @return \Illuminate\Support\Collection
     */
    public function index(EvidenceTrafficIndexRequest $request): \Illuminate\Support\Collection
    {
        return $this->service->index(EvidenceTraffic::class, null, $request->get('filter'));
    }

    /**
     * @param EvidenceTrafficShowRequest $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(EvidenceTrafficShowRequest $request, int $id): \Illuminate\Database\Eloquent\Model
    {
        return $this->service->show(EvidenceTraffic::class, $id, ['evidence', 'fromStorage', 'toStorage', 'employee']);
    }

    /**
     * @param EvidenceTrafficStoreRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(EvidenceTrafficStoreRequest $request): \Illuminate\Database\Eloquent\Model
    {
        return $this->service->store(EvidenceTraffic::class, $request->all());
    }

    /**
     * @param EvidenceTrafficUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(EvidenceTrafficUpdateRequest $request, int $id): \Illuminate\Database\Eloquent\Model
    {
        //dd($request);
        return $this->service->update(EvidenceTraffic::class, $id, $request->all(),  ['evidence', 'fromStorage', 'toStorage', 'employee']);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->service->destroy(EvidenceTraffic::class, $id);
    }

}
