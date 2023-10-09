<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[EmployeeController::class,'index']);
Route::get('/add',[EmployeeController::class,'addData']);
Route::post('/store',[EmployeeController::class,'storeData']);
Route::get('/edit/{id}',[EmployeeController::class,'editData']);
Route::post('/update/{id}',[EmployeeController::class,'updateData']);
Route::get('/delete/{id}',[EmployeeController::class,'deleteData']);
Route::get('/restore-data/{id}',[EmployeeController::class,'restoreData']);
Route::get('/parmanent-delete-data/{id}',[EmployeeController::class,'ParmanentdeleteData']);