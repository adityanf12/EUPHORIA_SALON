<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\ProfesionalController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\TestimonialController;

// ===========================
// Public Routes
// ===========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [BookingController::class, 'layanan'])->name('layanan');

// ===========================
// Auth Routes (Laravel UI)
// ===========================
Auth::routes();

// ===========================
// Customer Routes (Auth Required)
// ===========================
Route::middleware('auth')->prefix('customer')->group(function () {
    // Profile & History
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
    Route::get('/history', [CustomerController::class, 'history'])->name('customer.history');

    // Booking Flow
    Route::get('/booking/profesional/{layanan}', [BookingController::class, 'pilihProfesional'])->name('booking.profesional');
    Route::get('/booking/reservasi/{layanan}/{profesional}', [BookingController::class, 'reservasi'])->name('booking.reservasi');
    Route::post('/booking/available-slots', [BookingController::class, 'getAvailableSlots'])->name('booking.slots');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/sukses/{reservasi}', [BookingController::class, 'sukses'])->name('booking.sukses');
});

// ===========================
// Admin Routes
// ===========================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    })->name('index');
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Reservasi
    Route::get('/reservasi', [AdminController::class, 'reservasi'])->name('reservasi.index');
    Route::patch('/reservasi/{reservasi}/status', [AdminController::class, 'updateStatus'])->name('reservasi.updateStatus');

    // CRUD
    Route::resource('layanan', LayananController::class)->except(['show']);
    Route::patch('layanan/{layanan}/toggle-status', [LayananController::class, 'toggleStatus'])->name('layanan.toggleStatus');
    
    Route::resource('profesional', ProfesionalController::class)->except(['show']);
    
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    
    Route::resource('galeri', GaleriController::class)->except(['show']);
    Route::resource('testimonial', TestimonialController::class)->except(['show']);
});
