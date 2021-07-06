<?php

namespace App\Http\Controllers\Admin\ConfirmationMoney;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationMoney;
use App\Models\Customers;
use App\Models\TransferNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmationMoneyController extends Controller
{
    public function index()
    {
        $transfer_notice_histories = TransferNotice::where('status', 0)->orderByDesc('updated_at')->paginate(10);
        // return dd($transfer_notice_histories->id);
        return view('auth.admin.confirmation_money.confirmation_money', compact('transfer_notice_histories'));
    }

    public function accept(Request $request)
    {
        // return dd($request->cust_id);
        $user = Customers::find($request->cust_id);
        $transfer_notice = TransferNotice::find($request->id);


        $money_tran = floatval($transfer_notice->money);
        $money_user = floatval($user->money);
        $total_money = $money_user + $money_tran;
        // return dd($total_money);
        Customers::updateOrCreate(['id' => $request->cust_id], [
            "money" => $total_money,
        ]);
        $data = TransferNotice::updateOrCreate(['id' => $request->id], [
            "status" => "1",
        ]);

        ConfirmationMoney::updateOrCreate(['id' => ""], [
            "tran_id" => $request->id,
            "user_id" => Auth::guard('user')->user()->id,
        ]);


        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $data], 200);
    }
}
