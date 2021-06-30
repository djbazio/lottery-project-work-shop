<?php

namespace App\Http\Controllers\Admin\ManageData;

use App\Http\Controllers\Controller;
use App\Models\BankCustomer;
use App\Models\Customers;
use App\Models\MyBank;
use Illuminate\Http\Request;

class MgCusController extends Controller
{
    //จัดการข้อมูลลูกค้้า
    public function viewCustomer()
    {
        $customers = Customers::paginate(20);
        return view('auth.admin.manage_data.manage_customer', compact('customers'));
    }

    public function store(Request $request)
    {
        if ($request->id != "") {
            $customers = Customers::find($request->id);
            $request->validate(
                [
                    "username" => $customers->username != $request->username ? "required|min:6|max:12|unique:customers|unique:users" : "required|min:6|max:12|unique:users",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    "money" => "required|regex:/^\d+(\.\d{1,2})?$/",
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
                    //money
                    "money.required" => "กรุณากรอกช่องนี้",
                    "money.regex" => "กรุณากรอกตัวเลขที่เป็นจำนวนเงิน",
                ],
            );
            $user = Customers::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "address" => $request->address,
                "money" => $request->money,
                "tel" => $request->tel,
            ]);
        } else {
            //เพิ่มข้อมูลใหม่
            $request->validate(
                [
                    "username" => "required|min:6|max:12|unique:customers|unique:users",
                    "fname" => "required|min:2|max:255",
                    "lname" => "required|min:2|max:255",
                    "address" => "required|min:6|max:500",
                    "tel" => "min:10|max:10|unique:customers|unique:users",
                    "money" => "required|regex:/^\d+(\.\d{1,2})?$/",
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
                    "money.required" => "กรุณากรอกช่องนี้",
                    "money.regex" => "กรุณากรอกตัวเลขที่เป็นจำนวนเงิน",
                ],
            );
            $user = Customers::updateOrCreate(['id' => $request->id], [
                "username" => $request->username,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "money" => $request->money,
                "address" => $request->address,
                "password" => bcrypt($request->password),
                "tel" => $request->tel,
            ]);
        }



        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function getCustomerData($id)
    {
        $customers = Customers::find($id);
        return response()->json($customers);
    }

    public function deleteCustomer($id)
    {
        $customers = Customers::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function deleteAllLottery(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            Customers::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }

    //customer bank

    public function viewCustomerBank()
    {
        $customers_bank = BankCustomer::paginate(20);
        $customers = Customers::select('id', 'username')->get();
        return view('auth.admin.manage_data.manage_customer_bank', compact('customers_bank', 'customers'));
    }

    public function store_customers_bank(Request $request)
    {
        if ($request->id != "") {
            $customers_bank = BankCustomer::find($request->id);
            $request->validate(
                [
                    "no" => $customers_bank->no != $request->no ? "required|digits:10|unique:bank_customers|unique:my_banks" : "required|digits:10|unique:my_banks",
                    "name_account" => "required|min:2|max:255",
                    "name_bank" => "required|min:2|max:255",
                    "cust_id" => $customers_bank->cust_id != $request->cust_id ? "required|unique:bank_customers" : "required",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.digits" => "กรุณากรอกตัวเลข10หลัก",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",
                    //name_account
                    "name_account.required" => "กรุณากรอกช่องนี้",
                    "name_account.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name_account.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //name_bank
                    "name_bank.required" => "กรุณากรอกช่องนี้",
                    "name_bank.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name_bank.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //address
                    "cust_id.required" => "กรุณากรอกช่องนี้",
                    "cust_id.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",

                ],
            );
            $user = BankCustomer::updateOrCreate(['id' => $request->id], [
                "no" => $request->no,
                "name_account" => $request->name_account,
                "name_bank" => $request->name_bank,
                "cust_id" => $request->cust_id,
            ]);
        } else {
            //เพิ่มข้อมูลใหม่
            $request->validate(
                [
                    "no" => "required|digits:10|unique:bank_customers|unique:my_banks",
                    "name_account" => "required|min:2|max:255",
                    "name_bank" => "required|min:2|max:255",
                    "cust_id" => "required|unique:bank_customers",
                ],
                [
                    //no
                    "no.required" => "กรุณากรอกช่องนี้",
                    "no.digits" => "กรุณากรอกตัวเลข10หลัก",
                    "no.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",
                    //name_account
                    "name_account.required" => "กรุณากรอกช่องนี้",
                    "name_account.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name_account.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //name_bank
                    "name_bank.required" => "กรุณากรอกช่องนี้",
                    "name_bank.min" => "ต้องมีอย่างน้อย2ตัวอักษร",
                    "name_bank.max" => "ต้องมีไม่เกิน255ตัวอักษร",
                    //address
                    "cust_id.required" => "กรุณากรอกช่องนี้",
                    "cust_id.unique" => "ข้อมูลนี้ถูกใช้แล้วไม่สามารถใช้ซํ้าได้",
                ],
            );
            // return dd($request->cust_id);
            $user = BankCustomer::updateOrCreate(['id' => $request->id], [
                "no" => $request->no,
                "name_account" => $request->name_account,
                "name_bank" => $request->name_bank,
                "cust_id" => $request->cust_id,
            ]);
        }

        return response()->json(['code' => '200', 'message' => 'บันทึกข้อมูลสำเร็จ', 'data' => $user], 200);
    }

    public function getCustomerBank($id)
    {
        $customers_bank = BankCustomer::find($id);
        return response()->json($customers_bank);
    }

    public function deleteCustomerBank($id)
    {
        $customers_bank = BankCustomer::find($id)->delete();
        return response()->json(['sucess' => "ลบข้อมูลเรียบร้อย", "code" => "200"]);
    }

    public function deleteAllCustomerBank(Request $request)
    {
        $data = $request->pass;
        for ($i = 0; $i < count($data); $i++) {
            BankCustomer::find($data[$i]['id'])->delete();
        }
        return response()->json(["code" => "200", "message" => "ลบข้อมูลสำเร็จ", "data" => $data]);
    }
}
