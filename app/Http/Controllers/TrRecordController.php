<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Requests\TrRecordRequest;
use App\Models\TrRecord;
use App\Models\User;
use App\Models\TrPart;
use App\Models\TrMenu;
use App\Models\TrSettype;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DataTables;

class TrRecordController extends Controller
{

    public function index(Request $request) {

        $trRecords = TrRecord::orderBy('tr_date', 'desc')->paginate(10);
        return view('trrecords.index', compact('trRecords'));

    }

    public function show(Request $request, $id) {

        $trRecord = TrRecord::find($id);
        $user = User::find($id);
        return view('trrecords.show', compact(
            'trRecord',
            'user'
        ));

    }

    public function create() {

        $trParts = TrPart::pluck('part_name', 'id');
        $trSettypes = TrSettype::pluck('set_type', 'id');
        $trMenu = TrMenu::pluck('menu', 'id', 'tr_part_id');
        return view('trrecords.create', compact(
            'trParts',
            'trSettypes',
            'trMenu',
        ));

    }

    public function store(TrRecordRequest $request) {

        $validated = $request->safe()->only([
            'part',
            'menu',
            'set_type',
            'weight_first',
            'reps_first'
        ]);

        $trRecord = new TrRecord();
        $trRecord->user_id = Auth::id();
        $trRecord->part = $validated["part"];
        $trRecord->menu = $validated["menu"];
        $trRecord->set_type = $validated["set_type"];
        $trRecord->weight_first = $validated["weight_first"];
        $trRecord->reps_first = $validated["reps_first"];
        $trRecord->weight_second = $request->weight_second;
        $trRecord->reps_second = $request->reps_second;
        $trRecord->weight_third = $request->weight_third;
        $trRecord->reps_third = $request->reps_third;
        $trRecord->weight_fourth = $request->weight_fourth;
        $trRecord->reps_fourth = $request->reps_fourth;
        $trRecord->weight_fifth = $request->weight_fifth;
        $trRecord->reps_fifth = $request->reps_fifth;
        $trRecord->memo = $request->memo;
        if($request->tr_date === null) {
			$trRecord->tr_date = Carbon::now('Asia/Tokyo');
		} else {
			$trRecord->tr_date = $request->tr_date;
		}

        $trRecord->save();
        return redirect()->route('trrecords.index')->with(
            'message', '登録が完了しました'
        );
    }


    public function edit(Request $request, $id) {

        $trRecord = TrRecord::find($id);
        $this->authorize('update', $trRecord);

        return view('trrecords.edit', compact('trRecord'));
    }


    public function update(TrRecordRequest $request, $id) {

        $validated = $request->safe()->only([
            'part',
            'menu',
            'set_type',
            'weight_first',
            'reps_first'
        ]);

        $trRecord = TrRecord::find($id);
        $this->authorize('update', $trRecord);

        $trRecord->part = $validated["part"];
        $trRecord->menu = $validated["menu"];
        $trRecord->set_type = $validated["set_type"];
        $trRecord->weight_first = $validated["weight_first"];
        $trRecord->reps_first = $validated["reps_first"];
        $trRecord->weight_second = $request->weight_second;
        $trRecord->reps_second = $request->reps_second;
        $trRecord->weight_third = $request->weight_third;
        $trRecord->reps_third = $request->reps_third;
        $trRecord->weight_fourth = $request->weight_fourth;
        $trRecord->reps_fourth = $request->reps_fourth;
        $trRecord->weight_fifth = $request->weight_fifth;
        $trRecord->reps_fifth = $request->reps_fifth;
        $trRecord->memo = $request->memo;
        if($request->tr_date === null) {
			$trRecord->tr_date = Carbon::now('Asia/Tokyo');
		} else {
			$trRecord->tr_date = $request->tr_date;
		}

        $trRecord->save();
        return redirect()->route('trrecords.index')->with(
            'message', '修正が完了しました'
        );
    }

    public function destroy(Request $request, $id) {

        $trRecord = TrRecord::find($id);
        $this->authorize('delete', $trRecord);
        $trRecord->delete();

        return response()->json([
            'message' => 'トレーニングの削除が完了しました',
        ]);
    }

}
