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

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }
}
