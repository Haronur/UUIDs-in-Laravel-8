<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoryData', function (){
    $Category=Category::all(); // fetch the all contant
    //    dd($user);
    echo $Category . "<br/>";
});

Route::get('/categoryByID', function (){
    $Category=Category::find('1156a483-4603-42b5-b3e9-d71a6e4a4f17'); // fetch this specific ID's contant
    //    dd($user);
    echo $Category . "<br/>";
});
