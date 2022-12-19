<?php

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
Route::group(['prefix' => 'auth'], function(){
    Route::get('login', 'Auth\LoginController@login_get')->name('auth.get.login');
    Route::post('login', 'Auth\LoginController@login_post')->name('auth.post.login');
    Route::get('logout', 'Auth\LoginController@logout')->name('auth.get.logout');
});

Route::group(['middleware'=>['auth:admin,user']], function(){
    //Change password
    Route::get('change-password', 'Auth\ChangePasswordController@index')->name('user.get.changepassword');
    Route::post('change-password', 'Auth\ChangePasswordController@ajax')->name('user.post.changepassword');
    //Detail Account
    Route::get('account', 'Auth\DetailAccountController@index')->name('account.get.index');
    Route::post('account', 'Auth\DetailAccountController@ajax')->name('account.post.ajax');
    //Information website
    Route::get('website-information', 'MainStructure\Admins\WebsiteInformationController@index')
            ->name('admin.website.information.index');
    Route::post('website-information', 'MainStructure\Admins\WebsiteInformationController@ajax')
            ->name('admin.website.information.ajax');
});
Route::group(['prefix' => 'root','middleware'=>'auth:admin'], function(){
    Route::get('dashboard', 'MainStructure\Admins\DashboardController@dashboard')->name('admin.get.dashboard');
    //Manager list module
    Route::get('module', 'MainStructure\Admins\ModuleController@list_module')->name('admin.get.module');
    Route::post('action-module', 'MainStructure\Admins\ModuleController@action_module')->name('admin.action.module');
    Route::post('action-function', 'MainStructure\Admins\ModuleController@action_function')->name('admin.action.function');
    Route::post('action-groups-module', 'MainStructure\Admins\ModuleController@action_groups_modules')
            ->name('admin.action.group.modules');
    //Logs
    Route::get('logs', 'MainStructure\Admins\LogsController@index')->name('admin.get.logs.index');
    //Custom interface
        //Layout
        Route::get('layout', 'MainStructure\Admins\LayoutController@index')->name('user.custominterface.get.layout');
        Route::post('layout', 'MainStructure\Admins\LayoutController@ajax')->name('user.custominterface.post.layout');
});
// end Admin

// User
Route::group(['prefix' => 'admin', 'middleware'=>'auth:user'], function(){
    //Dashboard
    Route::get('dashboard', 'MainStructure\Users\DashboardController@dashboard')->name('user.get.dashboard');
    //Manager function permission according to user
    Route::get('function-permission', 'MainStructure\Users\FunctionPermissionsAccordingToUser@index')
            ->name('user.get.function.permission');
    Route::post('function-permission', 'MainStructure\Users\FunctionPermissionsAccordingToUser@ajax')
            ->name('user.action.function.permission');
    //Manager list users
    Route::get('users', 'MainStructure\Users\UsersController@index')->name('user.get.index');
    Route::post('users', 'MainStructure\Users\UsersController@ajax')->name('user.post.ajax');
    //Manager module permission
    Route::get('module-permission', 'MainStructure\Users\ModulePermissionsAccordingToUser@index')->name('user.get.module.permission');
    Route::post('module-permission', 'MainStructure\Users\ModulePermissionsAccordingToUser@ajax')->name('user.action.module.permission');
    
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
         \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    
    //Module
    require base_path('routes/partials/user_modules.php');
});
// end User
Route::get('/', 'Guests\PageController@index')->name('home.index');
Route::post('contact-post', 'Guests\PageController@contactPost')->name('home.contact.post');
Route::get('/chi-tiet-van-ban-chi-dao/{id}',array('as' => 'document_minTable_detail','uses'=>'Guests\PageController@document_minTable_detail'))->where(['id'=>'[0-9]+']);
Route::get('/chi-tiet-van-ban-quy-pham/{id}',array('as' => 'document_rules_of_law_detail','uses'=>'Guests\PageController@document_rules_of_law_detail'))->where(['id'=>'[0-9]+']);
Route::get('/thu-vien-anh/{id}',array('as' => 'get_lib','uses'=>'Guests\PageController@imagelibraryDetail'));
Route::get('{slug}', 'Guests\PageController@redirect')->name('home.redirect');
Route::get('{slug}/{slug1}', 'Guests\PageController@redirectDetail')->name('home.redirect.detail');
?>