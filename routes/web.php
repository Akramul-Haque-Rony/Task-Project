<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerSupplierFriendController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Customer Supplier Friend
    Route::get('customer/list', [App\Http\Controllers\CustomerSupplierFriendController::class, 'customer'])->name('customer.index');
    Route::get('supplier/list', [App\Http\Controllers\CustomerSupplierFriendController::class, 'supplier'])->name('supplier.index');
    Route::get('friend/list', [App\Http\Controllers\CustomerSupplierFriendController::class, 'friend'])->name('friend.index');
    Route::post('csf/store', [App\Http\Controllers\CustomerSupplierFriendController::class, 'store'])->name('csf.store');
    Route::post('csf/update/{id}', [App\Http\Controllers\CustomerSupplierFriendController::class, 'update'])->name('csf.update');


    // Search 
    Route::get('customerSearch', [App\Http\Controllers\SearchController::class, 'customerSearch'])->name('customerSearch');
    Route::get('supplierSearch', [App\Http\Controllers\SearchController::class, 'supplierSearch'])->name('supplierSearch');
    Route::get('friendSearch', [App\Http\Controllers\SearchController::class, 'friendSearch'])->name('friendSearch');

    // Expense
    Route::get('expense/list', [App\Http\Controllers\ExpenseController::class, 'index'])->name('expense.index');
    Route::get('expense/create', [App\Http\Controllers\ExpenseController::class, 'create'])->name('expense.create');
    Route::post('expense/store', [App\Http\Controllers\ExpenseController::class, 'store'])->name('expense.store');
    Route::post('expense/update/{id}', [App\Http\Controllers\ExpenseController::class, 'update'])->name('expense.update');
    
    // Income
    Route::get('income/list', [App\Http\Controllers\IncomeController::class, 'index'])->name('income.index');
    Route::get('income/create', [App\Http\Controllers\IncomeController::class, 'create'])->name('income.create');
    Route::post('income/store', [App\Http\Controllers\IncomeController::class, 'store'])->name('income.store');
    Route::post('income/update/{id}', [App\Http\Controllers\IncomeController::class, 'update'])->name('income.update');
    
    // Loan
    Route::get('loan/list', [App\Http\Controllers\LoanController::class, 'index'])->name('loan.index');
    Route::get('loan/create', [App\Http\Controllers\LoanController::class, 'create'])->name('loan.create');
    Route::post('loan/store', [App\Http\Controllers\LoanController::class, 'store'])->name('loan.store');
    Route::get('loan/edit/{id}', [App\Http\Controllers\LoanController::class, 'edit'])->name('loan.edit');
    Route::post('loan/update/{id}', [App\Http\Controllers\LoanController::class, 'update'])->name('loan.update');
    
    // Report
    Route::get('transaction/view/{id}', [App\Http\Controllers\CustomerSupplierFriendController::class, 'show'])->name('transaction.view');
    Route::get('reports/loan/view/{id}', [App\Http\Controllers\CustomerSupplierFriendController::class, 'loanReports'])->name('reports.loan');
    Route::get('report/profit-losss', [App\Http\Controllers\CustomerSupplierFriendController::class, 'profitLoss'])->name('report.profitLoss');
    Route::get('report/create', [App\Http\Controllers\ExpenseController::class, 'create'])->name('report.create');
    




});

require __DIR__.'/auth.php';
