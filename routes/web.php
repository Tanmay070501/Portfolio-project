<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/download/resume', function () {
    $file = public_path()."/TANMAY_MAHESHWARI_CV.pdf";
    $headers = array('Content-Type: application/pdf');
    return response()->download($file, "TANMAY_MAHESHWARI_CV.pdf", $headers);
})->name('resume');

Route::get('/about', function () {
    return view('about');
});
Route::get('/college', function () {
    return view('college');
});
Route::get('/diary/{id}',[DiaryController::class,'show']);
Route::get('/diary',[DiaryController::class,'showAll']);
Route::get('/friends',[UserController::class,'friends'])->name('friends');
Route::get('/premiums',[UserController::class,'premium'])->name('premiums');
Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware(['auth','verified','isAdmin'])->group(function(){
    Route::get('/create-diary',function(){
        return view('create_diary');
    })->name('create.diary');
    Route::get('/users',[UserController::class,'showAll'])->name('users');
    Route::post('/submit',[DiaryController::class,'store'])->name('submit');
    Route::delete('/diary/delete/{id}',[DiaryController::class,'delete'])->name('diary.delete');
    Route::post('/users/friend/remove/{id}',[UserController::class,'removeFriend'])->name('friend.remove');
    Route::post('/users/friend/add/{id}',[UserController::class,'addFriend'])->name('friend.add');
    Route::delete('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
});
Route::middleware(['auth','verified'])->group(function (){
    Route::post('/payment',[PaymentController::class, 'payment'])->name('payit');
    Route::delete('/comments/{id}',[CommentsController::class,'delete'])->name('comments.delete');
    Route::post('/comments',[CommentsController::class,'store'])->name('comment.add');
});
