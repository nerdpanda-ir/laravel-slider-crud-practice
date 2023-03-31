<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Slider\SliderListController;
use App\Http\Controllers\Admin\Slider\SliderTrashListController;
use App\Http\Controllers\Admin\Slider\SliderTrashController;
use App\Http\Controllers\Admin\Slider\SliderEditController;
use App\Http\Controllers\Admin\Slider\SliderUpdateController;
use App\Http\Controllers\Admin\Slider\SliderDeleteController;
use App\Http\Controllers\Admin\Slider\SliderRestoreController;
use App\Http\Controllers\Admin\Slider\SliderCreationController;
use App\Http\Controllers\Admin\Slider\SliderStoreController;
use App\Http\Controllers\Admin\Slider\DeleteAllSliderController;
use App\Http\Controllers\Admin\Slider\DeleteAllTrashedSliderController;
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


Route::get('',HomeController::class)->name('home');

Route::prefix('admin')
        ->name('admin.')
        ->group(function (){

            Route::name('slider.')
                    ->prefix('slider')
                    ->group(function (){
                        Route::get('',SliderListController::class)->name('home');
                        Route::get('/trash',SliderTrashListController::class)->name('trash-list');
                        Route::Delete('/trash/{id}',SliderTrashController::class)->name('trash-slide');
                        Route::get('/edit/{id}',SliderEditController::class)->name('edit');
                        Route::put('/edit/{id}',SliderUpdateController::class)->name('update');
                        Route::delete('/delete/{id}',SliderDeleteController::class)->name('delete-slide');
                        Route::get('/restore/{id}',SliderRestoreController::class)->name('restore-slide');
                        Route::get('create',SliderCreationController::class)->name('create-slide');
                        Route::post('create',SliderStoreController::class)->name('store-slide');
                        Route::delete('delete-all',DeleteAllSliderController::class)->name('delete-all-sliders');
                    });

        });
