<?php

namespace App\Http\Controllers;

use App\Services\EvidenceAppearanceService;
use Illuminate\Http\Request;

class EvidenceAppearancesController extends Controller
{
    public function __construct(private EvidenceAppearanceService $services)
    {
    }


}
