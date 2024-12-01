<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\User;

//rute login & regis
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role.access'])->group(function () {
    Route::get('/dashboard', function () {
        // Cek peran pengguna dan arahkan ke dashboard yang sesuai
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    })->name('dashboard');
});

// Rute untuk Admin
Route::middleware(['auth', 'role.access'])->group(function () {
    Route::get('/admin/dashboard', [Admin::class, 'index'])->name('admin.dashboard');
    // Tambahkan route lainnya untuk halaman admin
});

// Rute untuk User
Route::middleware(['auth', 'role.access'])->group(function () {
    Route::get('/user/dashboard', [User::class, 'index'])->name('user.dashboard');
    // Tambahkan route lainnya untuk halaman user
});


route::get('products ',[CrudController::class,'index'])->middleware(['auth', 'admin']);

//rute produk

Route::prefix('admin')->middleware(['auth', 'role.access:admin'])->group(function () {
    Route::resource('products', CrudController::class);
    Route::get('/products/{product}/edit', [CrudController::class, 'edit'])->name('products.edit');
    Route::get('products/{id}', [CrudController::class, 'show'])->name('products.show');
    Route::put('/products/{product}', [CrudController::class, 'update'])->name('products.update');
    Route::get('/products', [CrudController::class, 'index'])->name('products.index');

});
