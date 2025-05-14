<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('home'); // หรือ welcome ถ้าใช้หน้า default
});

// 🔹 หน้าแบบฟอร์มลงทะเบียน
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// 🔹 หน้าเลือกซื้อตั๋ว
Route::get('/ticket', [TicketController::class, 'create'])->name('ticket.form'); 
Route::post('/ticket', [TicketController::class, 'submit'])->name('ticket.submit');
