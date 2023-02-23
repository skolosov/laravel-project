<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Division;
use App\Services\DivisionService;
use Illuminate\Support\Collection;

class DivisionController extends Controller
{
    public function __construct(private DivisionService $service)
    {
    }

    public function index(): Collection
    {
        return $this->service->index(Division::class);
    }
}
