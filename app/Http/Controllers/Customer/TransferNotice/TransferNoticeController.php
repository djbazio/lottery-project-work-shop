<?php

namespace App\Http\Controllers\Customer\TransferNotice;

use App\Http\Controllers\Controller;
use App\Models\BankCustomer;
use App\Models\MyBank;
use App\Models\TransferNotice;
use Carbon\Carbon;
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
    //ประวัติ
    public function view_history()
    {
        $auth_user = Auth::guard('customer')->user();
        $transfer_notice_histories = TransferNotice::where('cusm_id', $auth_user->id)->orderByDesc('updated_at')->paginate(10);
        // return dd($transfer_notice_histories->id);
        return view('auth.customer.transfer_notice_history', compact('transfer_notice_histories'));
    }
    //ธนาคารของฉัน
    public function view_cus_bank()
    {
        $auth_user = Auth::guard('customer')->user();
        $bank_customers = BankCustomer::where('cust_id', $auth_user->id)->orderByDesc('updated_at')->paginate(10);
        return view('auth.customer.customer_bank', compact('bank_customers'));
    }

    public function cus_bank_store(Request $request)
    {
        if ($request->id != "") {
            $bank_customers = BankCustomer::find($request->id);
            $request->validate(
                [
                    "no" => $request->no != $bank_customers->no ? "required|digits:10|unique:bank_customers|unique:my_banks" : "required|digits:10|unique:my_banks",
                    "name_account" => "required|min:2|max:255",
                    "name_bank" => "required|min:2|max:255"
                ],
                // [
                //     //username
                //     "username.required" => "กรุณากรอกช่องนี้",
                //     "username.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                //     "username.max" => "ต้องมีไม่เกิน12ตัวอักษร",
                //     "username.unique" => "ชื่อผู้ใช้นี้ถูกใช้แล้ว",
                //     //name
                //     "name.required" => "กรุณากรอกช่องนี้",
                //     "name.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                //     "name.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                //     //tel
                //     "tel.min" => "กรุณากรอกเบอร์โทร10หลัก",
                //     "tel.max" => "กรุณากรอกเบอร์โทร10หลัก",
                //     "tel.unique" => "เบอร์โทรนี้ถูกใช้แล้ว",
                // ],
            );
        } else {
            $request->validate(
                [
                    "no" => "required|digits:10|unique:bank_customers|unique:my_banks",
                    "name_account" => "required|min:2|max:255",
                    "name_bank" => "required|min:2|max:255"
                ],
                // [
                //     //username
                //     "username.required" => "กรุณากรอกช่องนี้",
                //     "username.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                //     "username.max" => "ต้องมีไม่เกิน12ตัวอักษร",
                //     "username.unique" => "ชื่อผู้ใช้นี้ถูกใช้แล้ว",
                //     //name
                //     "name.required" => "กรุณากรอกช่องนี้",
                //     "name.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                //     "name.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                //     //tel
                //     "tel.min" => "กรุณากรอกเบอร์โทร10หลัก",
                //     "tel.max" => "กรุณากรอกเบอร์โทร10หลัก",
                //     "tel.unique" => "เบอร์โทรนี้ถูกใช้แล้ว",
                // ],
            );
        }
        $user = BankCustomer::updateOrCreate(['id' => $request->id], [
            "no" => $request->no,
            "name_account" => $request->name_account,
            "name_bank" => $request->name_bank,
            "cust_id" => Auth::guard('customer')->user()->id,
        ]);
        $user->updated_at_2 = Carbon::parse($user->updated_at)->locale('th')->diffForHumans();

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function get_customer_bank_data($id)
    {
        $bank_customers = BankCustomer::find($id);
        return response()->json($bank_customers);
    }

    public function delete_customer_bank($id)
    {
        $bank_customers = BankCustomer::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function delete_all_customer_bank(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            BankCustomer::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
