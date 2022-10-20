<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrRecordRequest;
use App\Models\TrRecord;
use App\Models\User;

class TrRecordController extends Controller
{
    public function index(Request $request) {
        $trRecords = TrRecord::all();
        return view('trrecords.index', compact('trRecords'));
    }
}
