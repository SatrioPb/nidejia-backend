<?php

use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\ListingController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return response()->json([
'success' => true,
'message'=> 'Detail login user',
'data' => $request->user()

    ]);
});


route::resource('listing', ListingController::class)->only(['index','show']);
route::post('Transaction/is-avalible', [TransactionController::class, 'isAvailable'])->middleware(['auth:sanctum']);

require __DIR__ . '/auth.php';
