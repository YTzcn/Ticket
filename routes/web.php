<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'loginP'])->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');

Route::prefix('ticket')->middleware('auth')->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/new', [TicketController::class, 'create'])->name('ticket.newTicket');
    Route::post('/create', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/detail/{id}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/endTicket/{id}', [TicketController::class, 'endTicekt'])->name('ticket.endTicket');
    Route::post('/addMessage', [TicketController::class, 'addMessage'])->name('ticket.addMessage');
});
Route::prefix('auth')->middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});


