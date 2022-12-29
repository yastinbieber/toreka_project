<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrMenuRequest;
use App\Models\TrMenu;
use App\Models\TrPart;

class TrMenuController extends Controller
{

    public function create() {
        $trParts = TrPart::pluck('part_name', 'id')->toArray();
        return view('trmenus.create', compact('trParts'));
    }

    public function store(TrMenuRequest $request) {
        $validated = $request->safe()->only([
            'menu',
            'tr_part_id',
        ]);

        $trMenu = new TrMenu();
        $trMenu->fill($request->all())->save();

        return redirect()->route('trrecords.create')->with(
            'message', 'トレーニングメニューの新規登録が完了しました'
        );
    }
}
