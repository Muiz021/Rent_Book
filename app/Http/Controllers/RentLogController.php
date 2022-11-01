<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $rentLogs = RentLogs::with(['user','book'])->get();
        return view('rentlog',compact('rentLogs', 'today'));
    }

}
