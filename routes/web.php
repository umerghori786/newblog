<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Jobs\OrderShippedJob;
use App\Evenets\OrderShipped;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Evenets\PrecticeEvent;
use App\Http\Controllers\JqueryController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Controllers\Subscriptions\PaymentController as payController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestFilterController;
use Illuminate\Support\Facades\Notification;
use App\Notifications\pushnotification;
use App\Evenets\MyEvent;
use App\Models\Product;
use App\Http\Controllers\RenderProductController;
use App\Http\Controllers\ActivityLogController;

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
    
    $pro = Product::create(['name'=>'observer test','description'=>'this is oberserver product test','price'=>100]);
    
    return view('welcome');
});
//
Route::get('/payment',[PaymentController::class, 'index']);
Route::post('/charge',[PaymentController::class ,'charge']);
Route::get('/confirm',[PaymentController::class, 'confirm']);

Route::group(['namespace' => 'Subscriptions'], function() {
    Route::get('plans', [SubscriptionController::class,'index'])->name('plans');
    Route::get('/payments', [PaymentController::class,'index'])->name('payments');
    Route::post('/payments', [PaymentController::class,'store'])->name('payments.store');
});

Route::get('/jquery',[JqueryController::class,'index']);
Route::post('/jquery',[JqueryController::class,'store']);
Route::get('/image_jquery',[JqueryController::class,'image_jquery']);
Route::post('/image_jquery',[JqueryController::class,'image_store']);
Route::get('/image_index',[JqueryController::class,'image_index']);
Route::get('/image/{id}/edit',[JqueryController::class,'image_edit']);
Route::get('/render',[JqueryController::class,'render']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
    //return redirect('/dashboard');

});

Route::get('/auth/callback', function () {

    $githubUser = Socialite::driver('facebook')->user();
    dd($githubUser);

    // $user->token
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//admin
Route::prefix('admin')->middleware('isAdmin')->name('admin.')->group(function(){
    Route::resource('/user',UserController::class);
    Route::get('prec',[UserController::class,'prec']);
});


/*laravel queues*/
Route::get('/email', function(){
     
     $user = User::first();
     OrderShippedJob::dispatch($user);

     return "email send";
});
/*end*/

/*
*event &listnerer
*/

Route::get('event',function(){

    $user = User::first();
    event(new OrderShipped($user));
});


Route::get('notification',function(){
    /*$user = User::first();
    Notification::send($user, new pushnotification($user));*/
    event(new MyEvent('hello world'));
});






//filter jqeury route
Route::get('/testFilter', [TestFilterController::class,'index']);
Route::get('/testfilterbook', [TestFilterController::class,'book']);
Route::get('/vue',[TestFilterController::class,'vue']); 


/*render data through controller*/
Route::get('/render-products',[RenderProductController::class,'index']);
Route::get('/productShow',[RenderProductController::class,'show'])->name('productShow');


/*activity log*/

Route::get('/log',[ActivityLogController::class,'index']);
Route::get('/readFile',[ActivityLogController::class,'readFile']);
/*end*/