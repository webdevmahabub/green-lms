<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;









// student class route api
Route::get('/class', [ApiController::class, 'index']);
Route::post('/class/store', [ApiController::class, 'Store']);
Route::get('/class/edit/{id}', [ApiController::class, 'Edit']);
Route::post('/class/update/{id}', [ApiController::class, 'Update']);
Route::get('/class/delete/{id}', [ApiController::class, 'Delete']);




// student  subject route api
Route::get('/subject', [ApiController::class, 'IndexSubject']);
Route::post('/subject/store', [ApiController::class, 'SubjectStore']);
Route::get('/subject/edit/{id}', [ApiController::class, 'subjectEdit']);
Route::post('/subject/update/{id}', [ApiController::class, 'subjectUpdate']);
Route::get('/subject/delete/{id}', [ApiController::class, 'subjectDelete']);












// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
