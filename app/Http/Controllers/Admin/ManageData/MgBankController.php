<?php

namespace App\Http\Controllers\Admin\ManageData;

use App\Http\Controllers\Controller;
use App\Models\MyBank;
use Illuminate\Http\Request;
use PDO;

class MgBankController extends Controller
{
    public function viewBank()
    {
        $my_banks = MyBank::paginate(20);
        return view('auth.admin.manage_data.manage_bank', compact('my_banks'));
    }

    public function store(Request $request)
    {
        $full_path = "images/unitity/NotFound.jpg";
        if ($request->logo != null) {
            //การเข้ารหัสรูปภาพ
            $service_image = $request->file('logo');
            //genarate ชื่อภาพ
            $name_gen = hexdec(uniqid());
            //ดึงนามสกุลรูป
            $img_ext = strtolower($service_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location = "images/services/bank_image/";
            $full_path = $upload_location . $img_name;
        }
        if ($request->id != "") {
            $my_bank = MyBank::find($request->id);
            $request->validate(
                [
                    "no" => $my_bank->no == $request->no ? "required|digits:10|numeric" : "required|digits:10|numeric|unique:my_banks",
                    "name" => "required|min:2|max:255",
                    "logo" => "mimes:png,jpg,jpeg",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.digits" => "กรุณากรอก10หลัก",
                    "no.numeric" => "กรอกเฉพาะตัวเลข",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",
                    //name
                    "name.required" => "กรุณากรอกช่องนี้",
                    "name.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //logo
                    "logo.mimes" => "กรุณาอัพโหลดรูปที่มีนามสกุล (png, jpg, jpeg)",
                ],
            );


            if ($request->logo != null) {
                if ($request->old_image != "images/unitity/NotFound.jpg") unlink($request->old_image);
                //    return dd($request->old_image);
                $user = MyBank::updateOrCreate(['id' => $request->id], [
                    "no" => $request->no,
                    "name" => $request->name,
                    "logo" => $full_path,
                ]);
                $service_image->move($upload_location, $img_name);
            } else {
                $user = MyBank::updateOrCreate(['id' => $request->id], [
                    "no" => $request->no,
                    "name" => $request->name,
                ]);
            }
        } else {
            //เพิ่มข้อมูลใหม่
            $request->validate(
                [
                    "no" => "required|digits:10|numeric|unique:my_banks",
                    "name" => "required|min:2|max:255",
                    "logo" => "mimes:png,jpg,jpeg",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.digits" => "กรุณากรอก10หลัก",
                    "no.numeric" => "กรอกเฉพาะตัวเลข",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",
                    //name
                    "name.required" => "กรุณากรอกช่องนี้",
                    "name.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //logo
                    "logo.mimes" => "กรุณาอัพโหลดรูปที่มีนามสกุล (png, jpg, jpeg)",
                ],
            );

            $user = MyBank::updateOrCreate(['id' => $request->id], [
                "no" => $request->no,
                "name" => $request->name,
                "logo" => $full_path,
            ]);
            if ($request->logo != null) {
                ///ลบรูปเก่า
                $service_image->move($upload_location, $img_name);
            }
        }


        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function getBankData($id)
    {
        $my_bank = MyBank::find($id);
        return response()->json($my_bank);
    }

    public function deleteBank($id)
    {
        $my_bank = MyBank::find($id);
        if ($my_bank->logo != "images/unitity/NotFound.jpg") unlink($my_bank->logo);
        $my_bank->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function deleteAllBank(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            $my_bank = MyBank::find($data[$i]['id']);
            if ($my_bank->logo != "images/unitity/NotFound.jpg") unlink($my_bank->logo);
            $my_bank->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
