<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataLaundryMemberController;
use App\Http\Controllers\DataLaundryNonMemberController;
use App\Http\Controllers\KaryawanLaundryMemberController;
use App\Http\Controllers\KaryawanLaundryNonMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminAccess'])->name('admin.')->group(function () {
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/pegawai', PegawaiController::class);
    Route::resource('/admin/member', MemberController::class);
    Route::resource('/admin/pembelian', PembelianController::class);
    Route::resource('/admin/dataLaundryMember', DataLaundryMemberController::class);
    Route::resource('/admin/dataLaundryNonMember', DataLaundryNonMemberController::class);
    Route::resource('/admin/barang', BarangController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'karyawanAccess'])->name('karyawan.')->group(function () {
    Route::resource('/karyawan/dataLaundryMember', KaryawanLaundryMemberController::class);
    Route::resource('/karyawan/dataLaundryNonMember', KaryawanLaundryNonMemberController::class);
    Route::get('/karyawan/dashboard', [DashboardController::class, 'karyawanDashboard'])->name('karyawan.dashboard');
});
