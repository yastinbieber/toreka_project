<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IdealWeightRequest;
use App\Models\User;
use App\Models\IdealWeight;
use Illuminate\Support\Facades\Auth;

class IdealWeightController extends Controller
{
    public function index() {
        return view('idealweights.index');
    }

    public function create() {
        $user_id = Auth::id();
        if (IdealWeight::where('user_id', $user_id)->exists()) {
            return redirect()->route('idealweights.index')->with(
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

        // バリデーション
        $idealWeight->height = $validated['height'];
        $idealWeight->weight = $validated['weight'];
        $idealWeight->target_weight = $validated['target_weight'];
        $idealWeight->exercise_level = $validated['exercise_level'];
        $idealWeight->start_day = $validated['start_day'];
        $idealWeight->last_day = $validated['last_day'];

        // バリデーションなし
        $idealWeight->user_id = Auth::id();
        // ボディメイク期間
        $startDay = strtotime($idealWeight->start_day);
        $lastDay = strtotime($idealWeight->last_day);
        $idealWeight->period = ($lastDay - $startDay) / (60 * 60 * 24);

        // 基礎代謝
        if (Auth::user()->gender === "男") {
            $idealWeight->basal_metabolism = 13.397*($idealWeight->weight)+4.799*($idealWeight->height)-5.677*(Auth::user()->age)+88.362; #男性の場合
        } else {
            $idealWeight->basal_metabolism = 9.247*($idealWeight->weight)+3.098*($idealWeight->height)-4.33*(Auth::user()->age)+447.593; #女性の場合
        }
        // 消費カロリー
        $idealWeight->calories_burned = ($idealWeight->basal_metabolism)*($idealWeight->exercise_level);
        // 何キロ落とすか
        $idealWeight->minus_weight = ($idealWeight->weight)-($idealWeight->target_weight);
        // 何キロカロリー落とすか
        $idealWeight->minus_calories = ($idealWeight->minus_weight)*7200;
        // 1日あたり何キロ落とせば良いか
        $idealWeight->minus_weight_day = ($idealWeight->minus_weight)/($idealWeight->period);
        // 1日あたり何キロカロリー摂取すればいいか
        $idealWeight->calories_intake = ($idealWeight->calories_burned)-($idealWeight->minus_calories)/($idealWeight->period);
        // タンパク質摂取量(g)
        if ($idealWeight->exercise_level === '1.9') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 2;
        } elseif ($idealWeight->exercise_level === '1.73') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.8;
        } elseif ($idealWeight->exercise_level === '1.55') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.4;
        } elseif ($idealWeight->exercise_level === '1.38') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1;
        } elseif ($idealWeight->exercise_level === '1.2') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 0.8;
        }
        // タンパク質摂取カロリー(g*4g)
        $idealWeight->protein_calories_intake = ($idealWeight->protein_gram_intake)*4;
        // 脂質摂取カロリー
        $idealWeight->fat_calories_intake = ($idealWeight->calories_intake)*0.2;
        // 脂質摂取量(g)
        $idealWeight->fat_gram_intake = ($idealWeight->fat_calories_intake)/9;
        // 炭水化物摂取カロリー
        $idealWeight->carbo_calories_intake = ($idealWeight->calories_intake)-($idealWeight->protein_calories_intake)-($idealWeight->fat_calories_intake);
        // 炭水化物摂取量(g)
        $idealWeight->carbo_gram_intake = ($idealWeight->carbo_calories_intake)/4;

        $idealWeight->save();

        return redirect()->route('idealweights.index')->with(
            'message', '登録が完了しました'
        );
    }

    public function show(Request $request, $id) {
        $idealWeight = IdealWeight::find($id);
        return view('idealweights.show', compact(
            'idealWeight'
        ));
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

        // バリデーション
        $idealWeight->height = $validated['height'];
        $idealWeight->weight = $validated['weight'];
        $idealWeight->target_weight = $validated['target_weight'];
        $idealWeight->exercise_level = $validated['exercise_level'];
        $idealWeight->start_day = $validated['start_day'];
        $idealWeight->last_day = $validated['last_day'];

        // バリデーションなし
        $idealWeight->user_id = Auth::id();
        // ボディメイク期間
        $startDay = strtotime($idealWeight->start_day);
        $lastDay = strtotime($idealWeight->last_day);
        $idealWeight->period = ($lastDay - $startDay) / (60 * 60 * 24);

        // 基礎代謝
        if (Auth::user()->gender === "男") {
            $idealWeight->basal_metabolism = 13.397*($idealWeight->weight)+4.799*($idealWeight->height)-5.677*(Auth::user()->age)+88.362; #男性の場合
        } else {
            $idealWeight->basal_metabolism = 9.247*($idealWeight->weight)+3.098*($idealWeight->height)-4.33*(Auth::user()->age)+447.593; #女性の場合
        }
        // 消費カロリー
        $idealWeight->calories_burned = ($idealWeight->basal_metabolism)*($idealWeight->exercise_level);
        // 何キロ落とすか
        $idealWeight->minus_weight = ($idealWeight->weight)-($idealWeight->target_weight);
        // 何キロカロリー落とすか
        $idealWeight->minus_calories = ($idealWeight->minus_weight)*7200;
        // 1日あたり何キロ落とせば良いか
        $idealWeight->minus_weight_day = ($idealWeight->minus_weight)/($idealWeight->period);
        // 1日あたり何キロカロリー摂取すればいいか
        $idealWeight->calories_intake = ($idealWeight->calories_burned)-($idealWeight->minus_calories)/($idealWeight->period);
        // タンパク質摂取量(g)
        if ($idealWeight->exercise_level === '1.9') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 2;
        } elseif ($idealWeight->exercise_level === '1.73') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.8;
        } elseif ($idealWeight->exercise_level === '1.55') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.4;
        } elseif ($idealWeight->exercise_level === '1.38') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1;
        } elseif ($idealWeight->exercise_level === '1.2') {
            $idealWeight->protein_gram_intake = ($idealWeight->weight) * 0.8;
        }
        // タンパク質摂取カロリー(g*4g)
        $idealWeight->protein_calories_intake = ($idealWeight->protein_gram_intake)*4;
        // 脂質摂取カロリー
        $idealWeight->fat_calories_intake = ($idealWeight->calories_intake)*0.2;
        // 脂質摂取量(g)
        $idealWeight->fat_gram_intake = ($idealWeight->fat_calories_intake)/9;
        // 炭水化物摂取カロリー
        $idealWeight->carbo_calories_intake = ($idealWeight->calories_intake)-($idealWeight->protein_calories_intake)-($idealWeight->fat_calories_intake);
        // 炭水化物摂取量(g)
        $idealWeight->carbo_gram_intake = ($idealWeight->carbo_calories_intake)/4;

        $idealWeight->save();

        return redirect()->route('idealweights.index')->with(
            'message', '修正が完了しました'
        );

        // public function destroy() {

        // }
    }
}
