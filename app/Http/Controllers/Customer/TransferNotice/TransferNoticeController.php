<?php

namespace App\Http\Controllers\Customer\TransferNotice;

use App\Http\Controllers\Controller;
use App\Models\MyBank;
use App\Models\TransferNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferNoticeController extends Controller
{
    public function index()
    {
        $my_banks = MyBank::all();
        return view('auth.customer.transfer_notice', compact('my_banks'));
    }

    public function store(Request $request)
    {
        //เพิ่มข้อมูลใหม่
        $request->validate(
            [
                "no" => "required|digits:10|numeric",
                "name_bank" => "required|min:2|max:255",
                "name_account" => "required|min:2|max:255",
                "bank_id" => "required",
                "money" => "required|min:2|max:10",
                "pic" => "required|mimes:png,jpg,jpeg",
            ],
            [
                //no
                "no.required" => "กรุณากรอกช่องนี้",
                "no.digits" => "กรุณากรอก10หลัก",
                "no.numeric" => "กรอกเฉพาะตัวเลข",
                //name_bank
                "name_bank.required" => "กรุณากรอกช่องนี้",
                "name_bank.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                "name_bank.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                //name_account
                "name_account.required" => "กรุณากรอกช่องนี้",
                "name_account.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                "name_account.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                //bank_id
                "bank_id.required" => "กรุณาเลือกธนาคารที่จะโอน",
                //money
                "money.required" => "กรุณากรอกช่องนี้",
                "money.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                "money.max" => "ต้องมีไม่เกิน10ตัวอักษร",
                //pic
                "pic.required" => "กรุณาอัพโหลดสลิปธนาคาร",
                "pic.mimes" => "กรุณาอัพโหลดรูปที่มีนามสกุล (png, jpg, jpeg)",
            ],
        );


        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('pic');
        //genarate ชื่อภาพ
        $name_gen = hexdec(uniqid());
        //ดึงนามสกุลรูป
        $img_ext = strtolower($service_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;

        $upload_location = "images/services/receipt/";
        $full_path = $upload_location . $img_name;


        $user = TransferNotice::updateOrCreate(['id' => ""], [
            "no" => $request->no,
            "name_account" => $request->name_account,
            "name_bank" => $request->name_bank,
            "status" => '0',
            "pic" => $full_path,
            "money" => $request->money,
            "cusm_id" => Auth::guard('customer')->user()->id,
            "bank_id" => $request->bank_id,
        ]);

        $service_image->move($upload_location, $img_name);

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function view_history()
    {
        $auth_user = Auth::guard('customer')->user();
        $transfer_notice_histories = TransferNotice::where('cusm_id', $auth_user->id)->orderByDesc('updated_at')->paginate(10);
        // return dd($transfer_notice_histories->id);
        return view('auth.customer.transfer_notice_history', compact('transfer_notice_histories'));
    }
}
