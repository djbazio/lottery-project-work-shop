<?php

namespace App\Http\Controllers\Branch\ManageLottery;

use App\Http\Controllers\Controller;
use App\Models\Consignment;
use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageLotteryController extends Controller
{
    public function index()
    {
        $consignments = Consignment::where('bran_id', Auth::guard('branch')->user()->id)->paginate(10);
        return view('auth.branch.manage_lottery.manage_lottery', compact('consignments'));
    }
}
