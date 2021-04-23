<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Category\Controllers\Api\CategoryController;
use App\Modules\Item\Controllers\Api\ItemController;

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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::prefix('category')->group(
    function () {
        Route::get('all', [CategoryController::class, 'getAll'])
            ->name('api.category.all');
        Route::get('/{id}', [CategoryController::class, 'get'])
            ->name('api.category.get');
        Route::put('/', [CategoryController::class, 'store'])
            ->name('api.category.store');
        Route::post('/{id}', [CategoryController::class, 'update'])
            ->name('api.category.update');
        Route::delete('/{id}', [CategoryController::class, 'delete'])
            ->name('api.category.delete');
    }
);


Route::prefix('item')->as('api.item.')->group(
    function () {
        Route::get('all', [ItemController::class, 'getAll'])
            ->name('api.item.all');
        Route::get('/{id}', [ItemController::class, 'get'])
            ->name('api.item.get');
        Route::put('/', [ItemController::class, 'store'])
            ->name('api.item.store');
        Route::post('/{id}', [ItemController::class, 'update'])
            ->name('api.item.update');
        Route::delete('/{id}', [ItemController::class, 'delete'])
            ->name('api.item.delete');
    }
);
