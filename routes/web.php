<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Request;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::namespace('Admin')->prefix('admin')->middleware('auth')->middleware('check:Admin')->group(function(){
Route::get('/','WorksController@dashbord')->name('work.dashbord');
Route::get('/works/create','WorksController@create')->name('work.create');
Route::post('/works','WorksController@store')->name('work.store');
Route::get('/works/edit/{id}','WorksController@edit')->name('work.edit');
Route::post('/works/{id}','WorksController@update')->name('work.update');
Route::delete('/works/delete/{id}','WorksController@delete')->name('work.delete');
Route::get('/orders','WorksController@indexOrders')->name('work.orders');

Route::get('/works/indexMotion','WorksController@indexMotion')->name('work.Motion');
Route::get('/works/indexLogo','WorksController@indexLogo')->name('work.logo');
Route::get('/works/indexVoice','WorksController@indexVoice')->name('work.voice');
Route::get('/works/indexWeb','WorksController@indexWeb')->name('work.web');
Route::get('/works/indexApp','WorksController@indexApp')->name('work.app');
Route::post('/ball/{id}','WorksController@storeBall')->name('user.ball');
Route::post('/price/{id}','WorksController@storePriceOrder')->name('user.priceOrder');
Route::get('/indexMessage','WorksController@indexMessage')->name('work.indexMessage');  


});



Route::namespace('user')->prefix('user')->group(function(){
    
    Route::get('/works/indexMotion','WorkController@indexMotion')->name('user.Motion');
    Route::get('/works/indexLogo','WorkController@indexLogo')->name('user.logo');
    Route::get('/works/indexVoice','WorkController@indexVoice')->name('user.voice');
    Route::get('/works/indexWeb','WorkController@indexWeb')->name('user.web');
    Route::get('/works/indexApp','WorkController@indexApp')->name('user.app'); 
    
    });

    Route::post('/message',[App\Http\Controllers\user\WorkController::class, 'storeMessage'])->name('work.storeMessage');

    Route::get('/status','PaymentController@status')->name('user.status');

Route::get('/indexOrders','OrderController@index')->name('orders');

Route::get('/','Admin\WorksController@index')->name('user.home');
Route::post('/','FileController@download')->name('user.file');


Route::post('/payment','PaymentController@payWithPaypal')->name('user.checkout');
Auth::routes();

Route::get('/order',[OrderController::class,'create'])->name('order.create')->middleware('auth');
Route::post('/order',[OrderController::class,'store'])->name('order.store')->middleware('auth');


Route::get('/admin/notification','NotificationController@index')->middleware('auth')->name('notification');
Route::get('/admin/message','NotificationController@indexMessage')->middleware('auth')->name('Message');

Route::get('storage/{file}', function($file){
    return response()->file(storage_path('app/public/'.$file));
})->where('file','.*');


