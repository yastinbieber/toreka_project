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

        $user_id = Auth::id();
        $trRecords = TrRecord::where('user_id', $user_id)->orderBy('tr_date', 'desc')->paginate(10);
        return view('trrecords.index', compact('trRecords'));

    }

    public function create() {

        $trParts = TrPart::pluck('part_name', 'id')->toArray();
        $trSettypes = TrSettype::pluck('set_type', 'id')->toArray();
        $trMenu = TrMenu::pluck('menu', 'id', 'tr_part_id')->toArray();
        $date1 = strtotime('+9 hour');
        return view('trrecords.create', compact(
            'trParts',
            'trSettypes',
            'trMenu',
            'date1',
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
        $trRecord->fill($request->all())->save();

        return redirect()->route('trrecords.index')->with(
            'message', '登録が完了しました'
        );
    }

    public function show(Request $request, $id) {

        $trRecord = TrRecord::find($id);
        $user = User::find($id);
        return view('trrecords.show', compact(
            'trRecord',
            'user'
        ));

    }


    public function edit(Request $request, $id) {

        $trRecord = TrRecord::find($id);
        // dd($trRecord);
        $trParts = TrPart::pluck('part_name', 'id')->toArray();
        $trSettypes = TrSettype::pluck('set_type', 'id');
        $trMenu = TrMenu::pluck('menu', 'id', 'tr_part_id');
        $this->authorize('update', $trRecord);

        return view('trrecords.edit', compact(
            'trRecord',
            'trParts',
            'trSettypes',
            'trMenu',
        ));
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
        $trRecord->fill($request->all())->save();

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
