<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrMenu;

class WebApiController extends Controller
{
    public function getTrainingMenu(Request $request) {
        $menuVal = $request['menu_val'];
        $trMenu = TrMenu::where('tr_part_id', $menuVal)->get();
        $result = [];
        foreach ($trMenu as $item) {
            $result[$item->id] = $item->menu;
        }
        return response()->json($result);
    }
}
