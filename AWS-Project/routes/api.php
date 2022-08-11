<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Models\ArtPiece;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Create out API route that AWS API Gateway will use
Route::post('/test', [ApiController::class, 'awsCall'])->name('awsCall');

// Route::post('/test', function() {
//   return ArtPiece::create([
//     'title' => request('title'),
//     'description' => request('description'),
//     'artist' => request('artist'),
//     'no_of_past_owners' => request('no_of_past_owners'),
//     'type' => request('type'),
//     'for_sale' => request('for_sale'),
//     'creation_date' => request('creation_date'),
//     'value' => request('value'),
//     'user_id' => request('user_id')
//   ]);
// });
