<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceFormController extends Controller
{
    public function getForm(Request $request)
    {
        // Get sending $types from form (evidence-form.blade.php)
        $type = $request->get('type_evidence', null);
        return view('evidence-form',
            // Select * from EvidenceType and send it to view 'evidence-form.blade.php'
            ['types' => EvidenceType::all(), 'method' => 'post', 'type' => $type ?? 1]
        );
    }
}
