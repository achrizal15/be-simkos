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
    // Artisan::call('storage:link');
    return view('welcome');
});
Route::get('/link', function () {        
    // $target = '/be-simkos/storage/app/public';
    // $shortcut = '/public_html/simkosapi.rgtesting.site/public/storage';
    // $shortcut = '/public_html/be-simkos.jaserba.store/public/storage';
    // symlink($target, $shortcut);
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    echo $targetFolder;
    echo $linkFolder;
 });
