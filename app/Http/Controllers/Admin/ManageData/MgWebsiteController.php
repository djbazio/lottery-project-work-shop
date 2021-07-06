<?php

namespace App\Http\Controllers\Admin\ManageData;

use App\Http\Controllers\Controller;
use App\Models\DetailWebside;
use Illuminate\Http\Request;

class MgWebsiteController extends Controller
{
    public function viewWebsiteDetail()
    {
        $detail_webside = DetailWebside::first();
        return view('auth.admin.manage_data.manage_website_detail', compact('detail_webside'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => "required|min:2|max:255",
                "logo" => "mimes:png,jpg,jpeg",
            ],
            [
                //name
                "name.required" => "กรุณากรอกช่องนี้",
                "name.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                "name.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                //logo
                "logo.mimes" => "กรุณาอัพโหลดรูปที่มีนามสกุล (png, jpg, jpeg)",
            ]
        );
        $full_path = "images/unitity/NotFound.jpg";
        if ($request->logo != null) {
            //การเข้ารหัสรูปภาพ
            $service_image = $request->file('logo');
            //genarate ชื่อภาพ
            $name_gen = hexdec(uniqid());
            //ดึงนามสกุลรูป
            $img_ext = strtolower($service_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location = "images/services/website_detail/";
            $full_path = $upload_location . $img_name;
        }
        $user = DetailWebside::where('id', 1)->update([
            "name" => $request->name,
        ]);

        if ($request->logo != null) {
            $user = DetailWebside::where('id', 1)->update([
                "name" => $request->name,
                "logo" => $full_path,
            ]);
            ///ลบรูปเก่า
            unlink($request->old_image);
            $service_image->move($upload_location, $img_name);
        }

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $full_path], 200);
    }
}
