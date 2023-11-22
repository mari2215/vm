<?php

use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\Api\OutletMapController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/figure', [App\Http\Controllers\HomeController::class, 'figure'])->name('figure');
// Route::get('/event/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('event');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/map', [HomeController::class, 'map'])->name('map');
Route::get('/event/{id}', [App\Http\Controllers\HomeController::class, 'view'])
    ->name('event')
    ->middleware('guest');


// Route::middleware(['guest'])->group(function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/', [HomeController::class, 'index'])->name('home');
//     Route::get('/map', [HomeController::class, 'map'])->name('map');
//     Route::get('/event/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('event');
// });


Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/map', [HomeController::class, 'map'])->name('map');
    Route::get('/event/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('event');
});

Route::middleware(['auth', 'user-role:admin'])->prefix('admin')->group(function () {

    Route::get('/map', [HomeController::class, 'map'])->name('map');

    Route::get('/index', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('event', [App\Http\Controllers\Admin\EventController::class, 'index']);
    Route::get('add-event', [App\Http\Controllers\Admin\EventController::class, 'create']);
    Route::post('add-event', [App\Http\Controllers\Admin\EventController::class, 'store']);

    Route::get('figure', [App\Http\Controllers\Admin\FiguresController::class, 'index']);
    Route::get('add-figure', [App\Http\Controllers\Admin\FiguresController::class, 'create']);
    Route::post('add-figure', [App\Http\Controllers\Admin\FiguresController::class, 'store']);
    Route::get('view-figure/{figure_id}', [App\Http\Controllers\Admin\FiguresController::class, 'view']);
    Route::get('edit-figure/{figure_id}', [App\Http\Controllers\Admin\FiguresController::class, 'edit']);
    Route::put('update-figure/{figure_id}', [App\Http\Controllers\Admin\FiguresController::class, 'update']);
    Route::get('delete-figure/{figure_id}', [App\Http\Controllers\Admin\FiguresController::class, 'delete']);


    Route::get('add-place', [App\Http\Controllers\Admin\MapController::class, 'create'])->name('admin.add-place');
    Route::get('places', [App\Http\Controllers\Admin\MapController::class, 'index'])->name('admin.places.index');
    Route::post('add-place', [App\Http\Controllers\Admin\MapController::class, 'store'])->name('admin.places.store');
    Route::get('edit-place/{place_id}', [App\Http\Controllers\Admin\MapController::class, 'edit']);
    Route::put('update-place/{place_id}', [App\Http\Controllers\Admin\MapController::class, 'update']);

    Route::get('view-event/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'view']);
    Route::get('edit-event/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'edit']);
    Route::put('update-event/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'update']);
    Route::get('delete-event/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'delete']);
    Route::get('get-events', [App\Http\Controllers\Admin\EventController::class, 'getEvents']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/slider', [HomeController::class, 'slider'])->name('slider');
    Route::get('/event/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('event');
});

