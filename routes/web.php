<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserCarsController;
use App\Http\Controllers\RentalHistoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AdminCarsController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarStocksController;

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

Route::get('/usercars/paymentprocess', function () {
    return view('user.usercars.paymentprocess');
})->name('user.paymentprocess');



// Admin Car Categories
Route::prefix('admin')->middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/economy', function () {
        return view('admin.admincars.economy');
    })->name('admin.economy');

    Route::get('/compact', function () {
    return view('admin.admincars.compact');
    })->name('admin.compact');

    Route::get('/fullsize', function () {
        return view('admin.admincars.fullsize');
    })->name('admin.fullsize');

    Route::get('/luxury', function () {
        return view('admin.admincars.luxury');
    })->name('admin.luxury');

    Route::get('/suv', function () {
        return view('admin.admincars.suv');
    })->name('admin.suv');

    Route::get('/van', function () {
        return view('admin.admincars.van');
    })->name('admin.van');

    Route::get('/sports', function () {
        return view('admin.admincars.sports');
    })->name('admin.sports');

    Route::get('/truck', function () {
        return view('admin.admincars.truck');
    })->name('admin.truck');

    Route::get('/ecars', function () {
        return view('admin.admincars.ecars');
    })->name('admin.ecars');

    Route::get('/test', function () {
        return view('admin.admincars.test');
    })->name('admin.test');


    Route::get('/addcars', function () {
        return view('admin.addcars');
    })->name('addcars');






});


Route::get('/dateform', [DateController::class, 'showForm'])->name('dateform');
Route::post('/dateform', [DateController::class, 'store'])->name('saveDate');

Route::get('/cars', function () {
    return view('user.cars');
})->middleware(['auth'])->name('user.cars');

Route::get('/sales', function () {
    return view('user.sales');
})->middleware(['auth'])->name('user.sales');

Route::get('/inventory', function () {
    return view('user.inventory');
})->middleware(['auth'])->name('user.inventory');


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
    Route::get('/admin/admincars', [AdminCarsController::class, 'index'])->name('admin.admincars');
    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory');
    Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('admin.employees');
    Route::get('/admin/sales', [SalesController::class, 'index'])->name('admin.sales');
});

Route::get('/admin/add', function () {
    return view('admin.add-employee');
})->name('addemployee');



Route::post('/admin/add', [AddAdminController::class, 'add'])->name('addemployee');

Route::get('/admin/employees', [AddAdminController::class, 'list'])->name('admin.employees');

Route::delete('delete/{id}', [AddAdminController::class, 'delete'])->name('admin.employees.delete');


Route::post('/add-car', [CarController::class, 'store'])->name('addcar');

Route::get('/carstock', [CarStocksController::class, 'index']);


