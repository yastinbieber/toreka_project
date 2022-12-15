<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\TrRecord;
use App\Models\User;
use App\Models\TrPart;
use App\Models\TrMenu;
use App\Models\TrSettype;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index() {
        return view('users.index');
    }

    public function show(Request $request, $id) {
        $user = User::find($id);
        // $user = Auth::id();
        return view('users.show', compact('user'));
    }

    public function edit(Request $request, $id) {
        // $user = Auth::id();
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id) {

        $validated = $request->safe()->only([
            'area',
            'birthday',
            'gender',
        ]);

        $user = User::find($id);
        $user->area = $validated["area"];
        $user->birthday = $validated["birthday"];
        $user->gender = $validated["gender"];
        $user->text = $request->text;
        $user->age = Carbon::parse($user->birthday)->age;
        $user->save();

        return redirect()->route('users.index')->with(
            'message', 'ユーザー情報を登録しました'
        );
    }
}
