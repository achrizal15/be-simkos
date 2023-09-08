<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    echo __DIR__.'/apiFrontEnd.php';
    // Artisan::call('storage:link');
    return view('welcome');
});
Route::get('/link', function () {       
    Artisan::call('optimize:clear');
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    dump($targetFolder);
    dump($linkFolder);
    symlink($targetFolder, $linkFolder);
 });
