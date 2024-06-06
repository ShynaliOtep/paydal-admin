<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/excel/read', [App\Http\Controllers\ExcelController::class, 'read']);

Route::get('/volunteer/register', [App\Http\Controllers\VolunteerController::class, 'register']);

Route::get('/police/violation/{id}', [App\Http\Controllers\ViolationController::class, 'policeViolation']);

Route::get('/violations', [App\Http\Controllers\ViolationController::class, 'list']);

Route::get('/volunteer/violations/{userId}', [App\Http\Controllers\ViolationController::class, 'volunteerViolations']);

Route::get('/volunteer/violations/{userId}', [App\Http\Controllers\ViolationController::class, 'volunteerViolations']);
