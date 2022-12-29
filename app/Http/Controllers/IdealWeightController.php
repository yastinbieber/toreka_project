<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IdealWeightRequest;
use App\Models\User;
use App\Models\IdealWeight;
use App\Models\UserMotivation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IdealWeightController extends Controller
{
    // Indexいらないそのうち消す
    public function index() {
        $user_id = Auth::id();
        $idealWeight = IdealWeight::where('user_id', $user_id)->first();
        $idealWeightId = $idealWeight->id;
        if (IdealWeight::where('user_id', $user_id)->exists()) {
            return redirect()->route('idealweights.show',[$idealWeightId]);
        } else {
            return redirect()->route('idealweights.create');
        }
    }

    public function create() {
        $user_id = Auth::id();
        $idealWeight = IdealWeight::where('user_id', $user_id)->first();
        $idealWeightId = $idealWeight->id;
        if (IdealWeight::where('user_id', $user_id)->exists()) {
            return redirect()->route('idealweights.show', [$idealWeightId])->with(
                'message', 'ボディメイク目標は既に登録済みです'
            );
        }
        return view('idealweights.create');
    }

    public function store(IdealWeightRequest $request) {

        $validated = $request->safe()->only([
            'height',
            'weight',
            'target_weight',
            'exercise_level',
            'start_day',
            'last_day',
        ]);

        $idealWeight = new IdealWeight();

        $idealWeight->user_id = Auth::id();
        $idealWeight->fill($request->all())->save();

        if (UserMotivation::where('user_id', Auth::id())->exists()) {
            return redirect()->route('users.show', [Auth::id()]);
        } else {
            return redirect()->route('usermotivations.create')->with(
                'message', '基本情報の入力が完了したので、次に目標を登録しましょう'
            );
        }
    }

    public function show(Request $request, $id) {
        $idealWeight = IdealWeight::find($id);
        return view('idealweights.show', compact('idealWeight'));
    }

    public function edit(Request $request, $id) {

        $idealWeight = IdealWeight::find($id);
        $this->authorize('update', $idealWeight);

        return view('idealweights.edit', compact('idealWeight'));
    }

    public function update(IdealWeightRequest $request, $id) {

        $validated = $request->safe()->only([
            'height',
            'weight',
            'target_weight',
            'exercise_level',
            'start_day',
            'last_day',
        ]);

        $idealWeight = IdealWeight::find($id);
        $this->authorize('update', $idealWeight);

        $idealWeight->user_id = Auth::id();
        $idealWeight->fill($request->all())->save();

        return redirect()->route('idealweights.show',[$idealWeight->id])->with(
            'message', '修正が完了しました'
        );
    }

    public function destroy($id) {

        $idealWeight = IdealWeight::find($id);
        $this->authorize('delete', $idealWeight);

        $idealWeight->delete();

        return redirect()->route('idealweights.create')->with(
            'msg', 'ボディメイク目標の削除が完了しました'
        );
    }

}
