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
use App\Http\Controllers\DateController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/carousel', function () {
    return view('carousel');
});

// User Cars Category
Route::get('/economy', function () {
    return view('user.usercars.economy');
})->name('economy');

Route::get('/compact', function () {
    return view('user.usercars.compact');
})->name('compact');

Route::get('/fullsize', function () {
    return view('user.usercars.fullsize');
})->name('fullsize');

Route::get('/luxury', function () {
    return view('user.usercars.luxury');
})->name('luxury');

Route::get('/suv', function () {
    return view('user.usercars.suv');
})->name('suv');

Route::get('/van', function () {
    return view('user.usercars.van');
})->name('van');

Route::get('/sports', function () {
    return view('user.usercars.sports');
})->name('sports');

Route::get('/truck', function () {
    return view('user.usercars.truck');
})->name('truck');

Route::get('/ecars', function () {
    return view('user.usercars.ecars');
})->name('ecars');

Route::get('/rentprocess', function () {
    return view('user.rentprocess');
})->name('rentprocess');

Route::get('/dateform', [DateController::class, 'showForm']);
Route::post('/savedate', [DateController::class, 'store'])->name('saveDate');

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
