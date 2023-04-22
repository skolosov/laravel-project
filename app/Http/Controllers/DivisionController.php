<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Division;
use App\Services\DivisionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class DivisionController extends Controller
{
    public function __construct(private DivisionService $service)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return JsonResource::collection($this->service->index(Division::class));
    }
}
