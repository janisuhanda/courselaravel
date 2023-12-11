<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('/welcome',function(){
    echo "welcome to my web";
});

Route::get('/show/{id?}',function($id=1){
    echo "nilai parameter adalah $id";
});

Route::get('/edit/{nama}',function($nama){
    echo "nilai parameter adalah $nama";
})->where('nama','[a-zA-Z]+');


Route::get('/index',function(){
    echo "<a href='".route('menulis')."'>akses route dengan nama</a>";
});

Route::get('/create',function(){
    echo "route diakses menghunakan nama";
})->name('menulis');

Route::get('/product',[ProductController::class,'index']);
Route::get('/productshow',[ProductController::class,'show']);
Route::get('/productshowall',[ProductController::class,'showAll']);

Route::resource('posts',PostController::class);

Route::get('/halaman',function(){
    $title = 'Harry Potter';
    $konten = 'harry potter and the deathly hallows: part 2';
    return view('konten.halaman',compact('title','konten'));
});
