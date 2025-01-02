<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FHistoryBettingController extends Controller
{
    public function index()
    {
        return view('frontend.history_betting.index');
    }
}
