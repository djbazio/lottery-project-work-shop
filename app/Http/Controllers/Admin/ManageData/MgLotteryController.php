<?php

namespace App\Http\Controllers\Admin\ManageData;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MgLotteryController extends Controller
{
    public function viewLottery()
    {
        $lotteries = Lottery::paginate(20);
        return view('auth.admin.manage_data.manage_lottery', compact('lotteries'));
    }

    public function store(Request $request)
    {
        if ($request->id != "") {
            $lottery = Lottery::find($request->id);
            $request->validate(
                [
                    "no" => $lottery->no != $request->no ? "required|min:6|max:6|unique:lotteries" :  "required|min:6|max:6",
                    "num" => "required|min:1|max:4",
                    "status" => "required",
                    "price" => "required|min:1|max:7",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.min" => "กรุณากรอกให้ครบ 6 หลัก",
                    "no.max" => "กรุณากรอกไม่เกิน 6 หลัก",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สารถมารถใช้ซํ้าได้",
                    //num
                    "num.required" => "กรุณากรอกช่องนี้",
                    "num.min" => "กรุณากรอกระหว่าง 1-6 หลัก",
                    "num.max" => "กรุณากรอกระหว่าง 1-6 หลัก",
                    //status
                    "status.required" => "กรุณากรอกช่องนี้",

                    //price
                    "price.required" => "กรุณากรอกช่องนี้",
                    "price.min" => "กรุณากรอกระหว่าง 1-7 หลัก",
                    "price.max" => "กรุณากรอกระหว่าง 1-7 หลัก",

                ],
            );
            $user = Lottery::updateOrCreate(['id' => $request->id], [
                "no" => $request->no,
                "num" => $request->num,
                "status" => $request->status,
                "price" => $request->price,
                "user_id" => Auth::guard('user')->user()->id,
            ]);
        } else {
            //เพิ่มข้อมูลใหม่
            $request->validate(
                [
                    "no" => "required|min:6|max:6|unique:lotteries",
                    "num" => "required|min:1|max:4",
                    "status" => "required",
                    "price" => "required|min:1|max:7",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.min" => "กรุณากรอกให้ครบ 6 หลัก",
                    "no.max" => "กรุณากรอกไม่เกิน 6 หลัก",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สารถมารถใช้ซํ้าได้",
                    //num
                    "num.required" => "กรุณากรอกช่องนี้",
                    "num.min" => "กรุณากรอกระหว่าง 1-6 หลัก",
                    "num.max" => "กรุณากรอกระหว่าง 1-6 หลัก",
                    //status
                    "status.required" => "กรุณากรอกช่องนี้",

                    //price
                    "price.required" => "กรุณากรอกช่องนี้",
                    "price.min" => "กรุณากรอกระหว่าง 1-7 หลัก",
                    "price.max" => "กรุณากรอกระหว่าง 1-7 หลัก",

                ],
            );
            $user = Lottery::updateOrCreate(['id' => $request->id], [
                "no" => $request->no,
                "num" => $request->num,
                "status" => $request->status,
                "price" => $request->price,
                "user_id" => Auth::guard('user')->user()->id,
            ]);
        }

        $data = User::find($user->user_id);

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user, 'admin_data' => $data], 200);
    }

    public function getLotteryData($id)
    {
        $lotteries = Lottery::find($id);
        return response()->json($lotteries);
    }

    public function deleteLottery($id)
    {
        $lottery = Lottery::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function deleteAllLottery(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            Lottery::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
