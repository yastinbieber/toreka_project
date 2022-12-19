<?php

namespace App\Http\Controllers;

use App\Models\HowtoVideo;
use Illuminate\Http\Request;

class HowtoVideoController extends Controller
{
    public function index() {
        $howtovideos = HowtoVideo::get();
        return view('howtovideos.index', compact('howtovideos'));
    }
}
