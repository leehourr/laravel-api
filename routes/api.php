<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\ManualController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('manuals', ManualController::class)->middleware('auth:sanctum');
Route::apiResource('manuals/{title}', ManualController::class)->middleware('auth:sanctum');
Route::apiResource('complaints', ComplaintController::class)->middleware('auth:sanctum');

Route::post('/your-manuals', [ManualController::class, 'manualOfUser'])->middleware('auth:sanctum');

Route::post('/admin/pending-manuals', [ManualController::class, 'pendingManuals'])->middleware('auth:sanctum');


Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');