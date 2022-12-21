<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserMotivationRequest;
use App\Models\IdealWeight;
use App\Models\UserMotivation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserMotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usermotivations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        // ログインユーザーのIdealWeightレコードが作られていたら処理を実行する
        if (IdealWeight::where('user_id', $user_id)->exists()) {
            if (userMotivation::where('user_id', $user_id)->exists()) {
                return redirect()->route('usermotivations.index')->with(
                    'message', 'ボディメイク目標は既に登録済みです'
                );
            }
            return view('usermotivations.create');
        } else {
            return redirect()->route('idealweights.create')->with(
                'message', 'まずボディメイク目標から登録しましょう',
            );
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserMotivationRequest $request)
    {
        $validated = $request->safe()->only([
            'training_frequency',
            'purpose',
        ]);

        $userMotivation = new userMotivation();

        // バリデーション
        $userMotivation->training_frequency = $validated['training_frequency'];
        $userMotivation->purpose = $validated['purpose'];

        $userMotivation->user_id = Auth::id();
        $userMotivation->ideal_weight_id = IdealWeight::where('user_id', '=', Auth::id())->first()->id;

        $userMotivation->save();

        return redirect()->route('usermotivations.index')->with(
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
        $userMotivation = userMotivation::find($id);
        return view('usermotivations.show', compact(
            'userMotivation'
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
        $userMotivation = UserMotivation::find($id);
        $this->authorize('update', $userMotivation);

        return view('usermotivations.edit', compact('userMotivation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserMotivationRequest $request, $id)
    {
        $validated = $request->safe()->only([
            'training_frequency',
            'purpose',
        ]);

        $userMotivation = UserMotivation::find($id);
        $this->authorize('update', $userMotivation);

        // バリデーション
        $userMotivation->training_frequency = $validated['training_frequency'];
        $userMotivation->purpose = $validated['purpose'];

        $userMotivation->user_id = Auth::id();
        $userMotivation->ideal_weight_id = IdealWeight::where('user_id', '=', Auth::id())->first()->id;

        $userMotivation->save();

        return redirect()->route('usermotivations.index')->with(
            'message', '修正が完了しました'
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
        $userMotivation = UserMotivation::find($id);
        $this->authorize('delete', $userMotivation);

        $userMotivation->delete();

        return redirect()->route('usermotivations.index')->with(
            'message', 'ボディメイク目標の削除が完了しました'
        );
    }
}
