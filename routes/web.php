<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfirmationMoney\ConfirmationMoneyController;
use App\Http\Controllers\Admin\ManageData\MgBankController;
use App\Http\Controllers\Admin\ManageData\MgCusController;
use App\Http\Controllers\Admin\ManageData\MgLotteryController;
use App\Http\Controllers\Admin\ManageData\MgWebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\TransferNotice\TransferNoticeController;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['dont_back'])->group(function () {

    Route::get('/', function () {
        if (Auth::guard('user')->check()) {
            $customers_row = Customers::count();
            $data = array('customers_row' => $customers_row);
            return view('auth.admin.home', ['data' => $data]);
        } else {
            // return dd(Auth::check());
            return view('nomal_user.home');
        }
    });

    Auth::routes(['reset' => false]);

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login')->middleware('check_go_login_page');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth:customer'])->group(function () {
        Route::get('customer/index', [CustomerController::class, 'index'])->name('customer.index');
        //1.1แจ้งโอน
        Route::get('customer/transfer_notice', [TransferNoticeController::class, 'index'])->name('customer.transfer_notice');
        Route::post('customer/transfer_notice/store', [TransferNoticeController::class, 'store'])->name('customer.transfer_notice.store');
        //1.2 ประวัติแจ้งโอน
        Route::get('customer/transfer_notice/view/history', [TransferNoticeController::class, 'view_history'])->name('customer.transfer_notice.view.history');
    });

    Route::middleware(['auth:user', 'checkstatus'])->group(function () {
        Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('admin/add', function () {
            return view('auth.admin.add');
        })->name('admin.add');
        ///จัดการแอตมิน
        Route::get('admin/view/viewAdmin', [AdminController::class, 'viewAdmin'])->name('admin.view.viewAdmin');
        Route::post('admin/api/getUserData/{id}', [AdminController::class, 'getUserData']);
        Route::post('admin/data/store', [AdminController::class, 'store'])->name('admin.data.store');
        Route::delete('admin/data/delete/user/{id}', [AdminController::class, 'deleteUser']);
        Route::post('admin/data/delete/all_user', [AdminController::class, 'deleteAllUser'])->name('admin.data.delete.all_user');
        //1.1จัดการลูกค้า
        Route::get('admin/view/viewCustomer', [MgCusController::class, 'viewCustomer'])->name('admin.view.viewCustomer');
        Route::post('admin/data/customer/store', [MgCusController::class, 'store'])->name('admin.data.customer.store');
        Route::post('admin/api/getCustomerData/{id}', [MgCusController::class, 'getCustomerData']);
        Route::delete('admin/data/delete/customer/{id}', [MgCusController::class, 'deleteCustomer']);
        Route::post('admin/data/delete/all_customer', [MgCusController::class, 'deleteAllCustomer'])->name('admin.data.delete.all_customer');
        //1.2 จัดการข้อมุลธนาคารลูกค้า
        Route::get('admin/view/viewCustomerBank', [MgCusController::class, 'viewCustomerBank'])->name('admin.view.viewCustomerBank');
        Route::post('admin/data/customers_bank/store', [MgCusController::class, 'store_customers_bank'])->name('admin.data.customers_bank.store');
        Route::post('admin/api/getCustomerBank/{id}', [MgCusController::class, 'getCustomerBank']);
        Route::delete('admin/data/delete/customer_bank/{id}', [MgCusController::class, 'deleteCustomerBank']);
        Route::post('admin/data/delete/all_customer_bank', [MgCusController::class, 'deleteAllCustomerBank'])->name('admin.data.delete.all_customer_bank');

        //จัดการล็อกตารี่
        Route::get('admin/view/viewLottery', [MgLotteryController::class, 'viewLottery'])->name('admin.view.viewLottery');
        Route::post('admin/data/lottery/store', [MgLotteryController::class, 'store'])->name('admin.data.lottery.store');
        Route::post('admin/api/getLotteryData/{id}', [MgLotteryController::class, 'getLotteryData']);
        Route::delete('admin/data/delete/lottery/{id}', [MgLotteryController::class, 'deleteLottery']);
        Route::post('admin/data/delete/all_lottery', [MgLotteryController::class, 'deleteAllLottery'])->name('admin.data.delete.all_lottery');
        //จัดการธนาคาร
        Route::get('admin/view/viewBank', [MgBankController::class, 'viewBank'])->name('admin.view.viewBank');
        Route::post('admin/data/bank/store', [MgBankController::class, 'store'])->name('admin.data.bank.store');
        Route::post('admin/api/getBankData/{id}', [MgBankController::class, 'getBankData']);
        Route::delete('admin/data/delete/bank/{id}', [MgBankController::class, 'deleteBank']);
        Route::post('admin/data/delete/all_bank', [MgBankController::class, 'deleteAllBank'])->name('admin.data.delete.all_bank');
        //จัดการข้อมูลเว็บไซต์
        Route::get('admin/view/viewWebsiteDetail', [MgWebsiteController::class, 'viewWebsiteDetail'])->name('admin.view.viewWebsiteDetail');
        Route::post('admin/data/websiteDetail/store', [MgWebsiteController::class, 'store'])->name('admin.data.websiteDetail.store');
        //1.1ยืนยันการเติมเงิน
        Route::get('admin/view/viewConfirmationMoney', [ConfirmationMoneyController::class, 'index'])->name('admin.view.viewConfirmationMoney');
        Route::post('admin/confirmation_money/accept/{id}/{cust_id}', [ConfirmationMoneyController::class, 'accept']);

    });
});
