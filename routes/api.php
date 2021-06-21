<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/authenticated', function ( ) {
    // return $request->user();
    return true;
});

Route::group([ 'middleware' => 'auth:api', 'prefix' => '/user'], function ($router) {
    Route::get('/user', 'api\UserController@currentUser');
    Route::post('/region','api\RegionController@store');
    

});


Route::group([ 'middleware' => 'auth:api', 'prefix' => '/todo'], function ($router) {
    Route::get('/items','api\TodoController@index');
    Route::get('/show/{id}','api\TodoController@show');
    Route::post('/store', 'api\TodoController@store');
    Route::put('/update/{id}','api\TodoController@update');
    Route::put('/edit/{id}','api\TodoController@edit');
    Route::delete('/delete/{id}','api\TodoController@destroy');
    Route::get('/search/{item}', 'api\TodoController@search');

});
// Route::group(['middleware' => 'auth:api'], function($router) {
//     Route::get('/authenticated', function(){
//         if(auth()->user() ){
//             return true; 
//         }
//       });

// });




Route::prefix('/user')->group( function(){
    Route::post('/login','api\LoginController@login');

});



// Route::get('/user', function (Request $request) {
//     return auth()->user();
// });

// Route::post('/login', function (Request $request){
//     $data = $request->validate([
//         'email' => 'required',
//         'password' => 'required',
//     ]);
//     auth()->attempt($request->only('email', 'password'));
//     return auth()->user();

// });
Route::post('/logout', 'api\LoginController@logoutApi');



