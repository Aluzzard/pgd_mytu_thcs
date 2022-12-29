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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // Route::get('products', 'Api\ProductController@index')->name('products.index');
    Route::post('products', function(Request $request){
        $sc = $request->input('secure');
        if($sc==md5("abc")){

        }
        $title = $request->input('title');
        
        return md5("abc");
    });
// });
