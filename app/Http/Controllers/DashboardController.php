<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\TrRecord;
use App\Models\User;
use App\Models\TrPart;
use App\Models\TrMenu;
use App\Models\TrSettype;
use App\Models\IdealWeight;
use App\Models\UserMotivation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $idealWeight = IdealWeight::where('user_id', $user_id)->first();
        $idealWeightId = $idealWeight->id;
        $userMotivation = UserMotivation::where('user_id', $user_id)->first();
        $userMotivationId = $userMotivation->id;
        return view('dashboard.index', compact(
            'idealWeightId',
            'user_id',
            'userMotivationId',
        ));
    }
}
