<?php

use App\Http\Livewire\LGAResults;
use App\Http\Livewire\PollingUnitResults;
use Illuminate\Support\Facades\Route;

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

Route::get('/', PollingUnitResults::class);
Route::get('/pu_results', PollingUnitResults::class);
Route::get('/lga_results', LGAResults::class);
