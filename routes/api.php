<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Routes untuk Galeri
Route::middleware(['auth'])->group(function () {
    // Galeri API endpoints
    Route::get('/galeri', [GaleriController::class, 'index']);
    Route::get('/galeri/{galeri}', [GaleriController::class, 'show']);
    Route::post('/galeri', [GaleriController::class, 'store']);
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update']);
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy']);
    Route::patch('/galeri/{galeri}/toggle-status', [GaleriController::class, 'toggleStatus']);
    
    // Kategori API endpoints
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/{kategori}', [KategoriController::class, 'show']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);
    
    // Petugas API endpoints
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/{petugas}', [PetugasController::class, 'show']);
    Route::post('/petugas', [PetugasController::class, 'store']);
    Route::put('/petugas/{petugas}', [PetugasController::class, 'update']);
    Route::delete('/petugas/{petugas}', [PetugasController::class, 'destroy']);
    
    // Pages API endpoints
    Route::get('/pages', [PageController::class, 'index']);
    Route::get('/pages/{page}', [PageController::class, 'show']);
    Route::post('/pages', [PageController::class, 'store']);
    Route::put('/pages/{page}', [PageController::class, 'update']);
    Route::delete('/pages/{page}', [PageController::class, 'destroy']);
    Route::patch('/pages/{page}/toggle-status', [PageController::class, 'toggleStatus']);
});
