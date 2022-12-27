<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Alcohol;
use App\Models\Evidence\Evidence;
use App\Models\Evidence\EvidenceTraffic;
use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceTrafficController extends Controller
{

    public function index()
    {
        $evidence = EvidenceTraffic::find(2)->evidence;
        //$evidence_traffic = EvidenceTraffic::all();
        dd($evidence);
    }


}
