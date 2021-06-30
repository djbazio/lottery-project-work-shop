<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customers_row = Customers::count();
        $data = array('customers_row' => $customers_row);
        return view('auth.admin.home',['data'=>$data]);
    }

    public function viewAdmin()
    {
        $admins = User::paginate('20');
        return view('auth.admin.manage_data.manage_admin', compact('admins'));
    }

    public function getUserData($id)
    {
        $admin = User::find($id);
        return response()->json($admin);
    }

    public function store(Request $request)
    {
        if ($request->id != "") {
            $admin = User::find($request->id);
            $request->validate(
                [
                    "username" => $admin->username != $request->username ? "required|min:6|max:12|unique:customers|unique:users" : "required|min:6|max:12|unique:customers",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    "tel" => $admin->tel != $request->tel ? "min:10|max:10|unique:customers|unique:users" : "min:10|max:10",
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
                ],
            );
            $user = User::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "address" => $request->address,
                "tel" => $request->tel,
            ]);
        } else {
            $request->validate(
                [
                    "username" => "required|min:6|max:12|unique:customers|unique:users",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    "tel" => "min:10|max:10|unique:customers|unique:users",
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
                ],
            );
            $user = User::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "address" => $request->address,
                "password" => bcrypt($request->password),
                "tel" => $request->tel,
            ]);
        }



        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function deleteAllUser(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            User::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
