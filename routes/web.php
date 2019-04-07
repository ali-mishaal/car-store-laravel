<?php

use App\Car;
use App\Carmodel;

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

// route for index page....................

Route::get('/' , function(){
      $getCars= [
      	         'topView' => Car::orderBy('view' ,'desc')->get(),
      	         'newCars' => Car::orderBy('created_at' , 'desc')->get(),
                 'models'  => Carmodel::where('parent_id' , 0)->get(),
      	        ]; 

      return view('welcome')->with('getCars' , $getCars);
});

// route for index page....................

Route::get('/car-for-sale' , function(){

      return view('menu.carSale');
})->name('car.sale');

// route for index page....................

Route::get('/sell-car' , function(){

      return view('menu.sellCar');
})->name('sell.car');

// route for index page....................

Route::get('/service-repair' , function(){

      return view('menu.serviceRepaire');
})->name('service.repair');

// route for index page....................

Route::get('/video-reviews' , function(){

      return view('menu.videoReviews');
})->name('video.reviewws');

// route for search page....................

Route::get('/search' , 'search@searchUser')->name('search');

//route for car
Route::resource('/category' , 'categoryController');

//route for car
Route::resource('/car' , 'carController');
Route::get('addimages/{id}' , 'carController@image_show')->name('addImages');
Route::post('addimages/{id}' , 'carController@add_images')->name('storeImages');
Route::post('editimages' , 'carController@edit_images')->name('edit.images');
Route::post('deleteimages' , 'carController@delete_images')->name('deleteImages');

//route for model
Route::resource('/model' , 'modeController');

//route for dashboard
Route::prefix('dashboard')->group(function(){
    
    Route::get('/' , 'dashboardController@index')->name('dashboard');
    Route::get('/setting' , 'dashboardController@setting')->name('setting');
    Route::get('/checkpass' , 'dashboardController@check_pass')->name('checkpass');
    Route::post('/updatepass' , 'dashboardController@update_pass')->name('updatepass');




}); 



// route for auth login register....................
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
      Route::get('/', 'adminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout' , 'Auth\AdminLoginController@logout')->name('admin.guard.logout');

	//password reset rotes

	Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});




