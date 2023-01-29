<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        return view (Division::class->all());
    }
}
