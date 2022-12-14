<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRecord;
use App\Models\User;
use App\Models\TrPart;
use App\Models\TrMenu;
use App\Models\TrSettype;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(Request $request, $id) {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update() {

    }
}
