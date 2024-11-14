<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserCarsController;
use App\Http\Controllers\RentalHistoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AdminCarsController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/car', function () {
//     return view('car');
// })->name('car');

// Route::get('/aboutus', function () {
//     return view('aboutus');
// })->name('aboutus');
// Route::get('/aboutus#', function () {
//     return view('aboutus#aboutus');
// })->name('aboutus#');

// Route::get('/contactus', function () {
//     return view('contactus');
// })->name('contactus');

Route::get('/carousel', function () {
    return view('carousel');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cars', function () {
    return view('user.cars');
})->middleware(['auth'])->name('user.cars');

Route::get('/sales', function () {
    return view('user.sales');
})->middleware(['auth'])->name('user.sales');

Route::get('/inventory', function () {
    return view('user.inventory');
})->middleware(['auth'])->name('user.inventory');


// Route::get('/home',[HomeController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


//user routes
Route::middleware(['auth', 'userMiddleware'])->group(function(){

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('usercars', [UserCarsController::class, 'index'])->name('user.usercars');
    Route::get('renthistory', [RentalHistoryController::class, 'index'])->name('user.renthistory');

});

//admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/admincars', [UserCarsController::class, 'index'])->name('admin.admincars');
    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory');
    Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('admin.employees');
    Route::get('/admin/sales', [SalesController::class, 'index'])->name('admin.sales');
});
