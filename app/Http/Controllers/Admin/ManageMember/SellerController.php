<?php

namespace App\Http\Controllers\Admin\ManageMember;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::paginate(10);
        return view('auth.admin.manage_member.manage_seller', compact('sellers'));
    }

    public function store(Request $request)
    {
        if ($request->id != "") {
            $customers = Seller::find($request->id);
            $request->validate(
                [
                    "username" => $customers->username != $request->username ? "required|min:6|max:12|unique:customers|unique:users|unique:branches|unique:sellers" : "required|min:6|max:12|unique:users|unique:customers|unique:branches",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    // "money" => "required|regex:/^\d+(\.\d{1,2})?$/",
                    "tel" => $customers->tel != $request->tel ? "min:10|max:10|unique:customers|unique:users" : "min:10|max:10",
                ],
                [
                    //username
                    "username.required" => "กรุณากรอกช่องนี้",
                    "username.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                    "username.max" => "ต้องมีไม่เกิน12ตัวอักษร",
                    "username.unique" => "ชื่อผู้ใช้นี้ถูกใช้แล้ว",
                    //fname
                    "fname.required" => "กรุณากรอกช่องนี้",
                    "fname.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "fname.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //lname
                    "lname.required" => "กรุณากรอกช่องนี้",
                    "lname.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "lname.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //address
                    "address.required" => "กรุณากรอกช่องนี้",
                    "address.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                    "address.max" => "ต้องมีไม่เกิน500ตัวอักษร",
                    //tel
                    "tel.min" => "กรุณากรอกเบอร์โทร10หลัก",
                    "tel.max" => "กรุณากรอกเบอร์โทร10หลัก",
                    "tel.unique" => "เบอร์โทรนี้ถูกใช้แล้ว",
                    // //money
                    // "money.required" => "กรุณากรอกช่องนี้",
                    // "money.regex" => "กรุณากรอกตัวเลขที่เป็นจำนวนเงิน",
                ],
            );
            $user = Seller::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "address" => $request->address,
                // "money" => $request->money,
                "tel" => $request->tel,
            ]);
        } else {
            //เพิ่มข้อมูลใหม่
            $request->validate(
                [
                    "username" => "required|min:6|max:12|unique:customers|unique:users|unique:branches|unique:sellers",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    "tel" => "min:10|max:10|unique:customers|unique:users|unique:branches|unique:sellers",
                    // "money" => "required|regex:/^\d+(\.\d{1,2})?$/",
                    "password" => "required|min:8|max:20|required_with:password_confirmation|same:password_confirmation",
                ],
                [
                    //username
                    "username.required" => "กรุณากรอกช่องนี้",
                    "username.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                    "username.max" => "ต้องมีไม่เกิน12ตัวอักษร",
                    "username.unique" => "ชื่อผู้ใช้นี้ถูกใช้แล้ว",
                    //fname
                    "fname.required" => "กรุณากรอกช่องนี้",
                    "fname.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "fname.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //lname
                    "lname.required" => "กรุณากรอกช่องนี้",
                    "lname.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "lname.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //address
                    "address.required" => "กรุณากรอกช่องนี้",
                    "address.min" => "ต้องมีอย่างน้อย6ตัวอักษร",
                    "address.max" => "ต้องมีไม่เกิน500ตัวอักษร",
                    //tel
                    "tel.min" => "กรุณากรอกเบอร์โทร10หลัก",
                    "tel.max" => "กรุณากรอกเบอร์โทร10หลัก",
                    "tel.unique" => "เบอร์โทรนี้ถูกใช้แล้ว",
                    //password
                    "password.required" => "กรุณากรอกช่องนี้",
                    "password.min" => "ต้องมีอย่างน้อย8ตัวอักษร",
                    "password.max" => "ต้องมีไม่เกิน20ตัวอักษร",
                    "password.same" => "กรุณายืนยันรหัสผ่านใหม่อีกครั้ง",
                    //money
                    // "money.required" => "กรุณากรอกช่องนี้",
                    // "money.regex" => "กรุณากรอกตัวเลขที่เป็นจำนวนเงิน",
                ],
            );
            $user = Seller::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                // "money" => $request->money,
                "address" => $request->address,
                "password" => bcrypt($request->password),
                "tel" => $request->tel,
            ]);
        }

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function get_seller_data($id)
    {
        $seller = Seller::find($id);
        return response()->json($seller);
    }

    public function delete_seller($id)
    {
        $seller = Seller::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function delete_all_seller(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            Seller::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
