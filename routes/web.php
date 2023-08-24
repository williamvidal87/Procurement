<?php

use App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest\AdminApprovePurchaseRequestTable;
use App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest\AdminSubmittedPurchaseRequestTable;
use App\Http\Livewire\AdminPanel\BudgetAllocation\BudgetAllocationTable;
use App\Http\Livewire\AdminPanel\BudgetUtilization\BudgetUtilizationTable;
use App\Http\Livewire\AdminPanel\ManageAccounts\AdminTable;
use App\Http\Livewire\AdminPanel\ManageAccounts\SpmoTable;
use App\Http\Livewire\AdminPanel\ManageAccounts\UserTable;
use App\Http\Livewire\AdminPanel\ProcurementReport\ProcurementReportTable;
use App\Http\Livewire\DashBoard\DashBoard;
use App\Http\Livewire\Profile\EditProfileForm;
use App\Http\Livewire\Profile\PasswordUpdate;
use App\Http\Livewire\SpmoPanel\ApprovePurchaseRequest\ApprovePurchaseRequestTable;
use App\Http\Livewire\SpmoPanel\CompletelyDelevered\CompletelyDeleveredTable;
use App\Http\Livewire\SpmoPanel\Home\HomeTable;
use App\Http\Livewire\SpmoPanel\SubmittedPurchaseRequest\SubmmitedPurchaseRequestTable;
use App\Http\Livewire\UserPanel\UserApprovePurchaseRequest\UserApprovePurchaseRequestTable;
use App\Http\Livewire\UserPanel\UserCompletelyDelivered\UserCompletelyDeliveredTable;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', DashBoard::class)->name('dashboard')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/editprofileform', EditProfileForm::class)->name('editprofileform')->middleware('checkpassword');
    Route::get('/passwordupdate', PasswordUpdate::class)->name('passwordupdate');


    // Admin Panel
    Route::get('/admin-table', AdminTable::class)->name('admin-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/spmo-table', SpmoTable::class)->name('spmo-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/user-table', UserTable::class)->name('user-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/budget-allocation', BudgetAllocationTable::class)->name('budget-allocation')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/budget-utilization', BudgetUtilizationTable::class)->name('budget-utilization')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/admin-submitted-purchase-request-table', AdminSubmittedPurchaseRequestTable::class)->name('admin-submitted-purchase-request-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/admin-approve-purchase-request-table', AdminApprovePurchaseRequestTable::class)->name('admin-approve-purchase-request-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/admin-completely-delevered-table', CompletelyDeleveredTable::class)->name('admin-completely-delevered-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');
    Route::get('/procurement-report-table', ProcurementReportTable::class)->name('procurement-report-table')->middleware('checkRulepermissionadmin')->middleware('checkpassword');

    //Spmo
    Route::get('/home-table', HomeTable::class)->name('home-table')->middleware('checkRulepermissionspmo')->middleware('checkpassword');
    Route::get('/submitted-purchase-request-table', SubmmitedPurchaseRequestTable::class)->name('submitted-purchase-request-table')->middleware('checkRulepermissionspmo')->middleware('checkpassword');
    Route::get('/approve-purchase-request-table', ApprovePurchaseRequestTable::class)->name('approve-purchase-request-table')->middleware('checkRulepermissionspmo')->middleware('checkpassword');
    Route::get('/completely-delevered-table', CompletelyDeleveredTable::class)->name('completely-delevered-table')->middleware('checkRulepermissionspmo')->middleware('checkpassword');

    //User
    Route::get('/user-home-table', HomeTable::class)->name('user-home-table')->middleware('checkRulepermissionuser')->middleware('checkpassword');
    Route::get('/user-submitted-purchase-request-table', SubmmitedPurchaseRequestTable::class)->name('user-submitted-purchase-request-table')->middleware('checkRulepermissionuser')->middleware('checkpassword');
    Route::get('/user-approve-purchase-request-table', UserApprovePurchaseRequestTable::class)->name('/user-approve-purchase-request-table')->middleware('checkRulepermissionuser')->middleware('checkpassword');
    Route::get('/user-completely-delivered-table', UserCompletelyDeliveredTable::class)->name('/user-completely-delivered-table')->middleware('checkRulepermissionuser')->middleware('checkpassword');

});
