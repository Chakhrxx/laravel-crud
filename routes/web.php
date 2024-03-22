<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\Api\CompanyController;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});



Route::resource('companies', CompanyCRUDController::class);

// Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');

Route::group(['prefix' => 'api/company/', 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('', [CompanyController::class, 'store']);
    Route::get('', [CompanyController::class, 'index']);
    Route::get('search', [CompanyCRUDController::class, 'search']);
    Route::get('{id}', [CompanyController::class, 'show']);
    // Route::put('{id}', [CompanyController::class, 'update']);
    // Route::delete('{id}', [CompanyController::class, 'destroy']);
});
