<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Status;
use App\Models\StatusHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DocController extends Controller
{
    public function getDocs()
    {
        $docs = Doc::query()
            ->with('status')
            ->get();
        $statuses = Status::all();

        $docs2 = DB::select('select * from docs');

        return view('welcome', ['docs' => $docs, 'statuses' => $statuses, 'docs2' => $docs2]);
    }

    public function updateStatus(Request $request, $id)
    {
        $doc = Doc::query()->find($id);
        DB::transaction(
            function () use ($request, $doc) {
                $statusCode = $request->get('status');
                $doc->status_id = $statusCode;
                $doc->save();
                StatusHistory::query()->create(['status_id' => $statusCode, 'status_change' => Carbon::now()]);
            }
        );
        return $this->getDocs();
    }
}
