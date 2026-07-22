<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PetCatalogController;
use App\Http\Controllers\SurrenderController;
use App\Http\Controllers\TransparencyController;
use App\Http\Controllers\Admin\{AuthController,DashboardController,DonationController as AdminDonationController,ExpenseController,PetController,SystemController};
use Illuminate\Support\Facades\Route;

Route::get('/', [PetCatalogController::class,'index'])->name('home');
Route::get('/pets', [PetCatalogController::class,'index'])->name('pets.index');
Route::get('/pets/{pet}', [PetCatalogController::class,'show'])->name('pets.show');
Route::post('/pets/{pet}/adopt', [AdoptionController::class,'store'])->name('adoption.store');
Route::get('/donate', [DonationController::class,'create'])->name('donations.create');
Route::post('/donate', [DonationController::class,'store'])->middleware('throttle:5,10')->name('donations.store');
Route::get('/surrender', [SurrenderController::class,'create'])->name('surrender.create');
Route::post('/surrender', [SurrenderController::class,'store'])->name('surrender.store');
Route::get('/transparency', [TransparencyController::class,'index'])->name('transparency');

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function(){Route::get('/login',[AuthController::class,'create'])->name('login');Route::post('/login',[AuthController::class,'store'])->middleware('throttle:5,1')->name('login.store');});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',DashboardController::class)->name('dashboard');
    Route::post('/logout',[AuthController::class,'destroy'])->name('logout');
    Route::resource('pets',PetController::class)->except('show');
    Route::delete('/pet-images/{image}',[PetController::class,'destroyImage'])->name('pet-images.destroy');
    Route::get('/donations',[AdminDonationController::class,'index'])->name('donations.index');
    Route::get('/donations/{donation}',[AdminDonationController::class,'show'])->name('donations.show');
    Route::get('/donations/{donation}/slip',[AdminDonationController::class,'slip'])->name('donations.slip');
    Route::patch('/donations/{donation}/approve',[AdminDonationController::class,'approve'])->name('donations.approve');
    Route::patch('/donations/{donation}/reject',[AdminDonationController::class,'reject'])->name('donations.reject');
    Route::resource('expenses',ExpenseController::class)->except('show');
    Route::post('/system/migrate',[SystemController::class,'migrate'])->middleware('throttle:1,1')->name('system.migrate');
});
