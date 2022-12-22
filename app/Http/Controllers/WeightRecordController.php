<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightRecordRequest;
use App\Models\User;
use App\Models\IdealWeight;
use App\Models\WeightRecord;
use Illuminate\Support\Facades\Auth;

class WeightRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $weightRecords = WeightRecord::where('user_id', $user_id)->orderBy('date', 'desc')->paginate(10);
        return view('weightrecords.index', compact('weightRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weightrecords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeightRecordRequest $request)
    {
        $validated = $request->safe()->only([
            'today_weight',
            'date',
        ]);

        $weightRecord = new weightRecord();

        // バリデーション
        $weightRecord->today_weight = $validated['today_weight'];
        $weightRecord->date = $validated['date'];

        $weightRecord->user_id = Auth::id();
        $weightRecord->ideal_weight_id = IdealWeight::where('user_id', '=', Auth::id())->first()->id;

        $weightRecord->save();

        return redirect()->route('weightrecords.index')->with(
            'message', '登録が完了しました'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weightRecord = WeightRecord::find($id);
        return view('weightrecords.show', compact(
            'weightRecord'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weightRecord = WeightRecord::find($id);
        $this->authorize('update', $weightRecord);

        return view('weightrecords.edit', compact('weightRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WeightRecordRequest $request, $id)
    {
        $validated = $request->safe()->only([
            'today_weight',
            'date',
        ]);

        $weightRecord = WeightRecord::find($id);
        $this->authorize('update', $weightRecord);

        // バリデーション
        $weightRecord->today_weight = $validated['today_weight'];
        $weightRecord->date = $validated['date'];

        $weightRecord->user_id = Auth::id();
        $weightRecord->ideal_weight_id = IdealWeight::where('user_id', '=', Auth::id())->first()->id;

        $weightRecord->save();

        return redirect()->route('weightrecords.index')->with(
            'message', '更新が完了しました'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weightRecord = WeightRecord::find($id);
        $this->authorize('delete', $weightRecord);
        $weightRecord->delete();

        return response()->json([
            'message' => '体重の削除が完了しました',
        ]);
    }
}
