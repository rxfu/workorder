<?php

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

Route::get(
    '/',
    function () {
        return redirect()->route('order.create');
    }
);

Auth::routes();

Route::get('/order', 'OrderController@create')->name('order.create');
Route::post('/order', 'OrderController@store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/password', 'UserController@password')->name('password');
    Route::put('/password/change', 'UserController@change');
    Route::name('order.')->group(
        function () {
            Route::get('/orders', 'OrderController@list')->name('list');
            // Route::get('/order', 'OrderController@create')->name('create');
            // Route::post('/order', 'OrderController@store');
            Route::get('/order/{id}/edit', 'OrderController@edit')->name('edit');
            Route::put('/order/{id}', 'OrderController@update');
            Route::delete('/order', 'OrderController@delete');
            Route::put('/order/status/{id}', 'OrderController@status');
        }
    );
    Route::name('type.')->group(
        function () {
            Route::get('/types/{action?}/{id?}', 'TypeController@list')->name('list');
            Route::post('/type', 'TypeController@store');
            Route::put('/type/{id}', 'TypeController@update');
            Route::delete('/type', 'TypeController@delete');
        }
    );
    Route::name('department.')->group(
        function () {
            Route::get('/departments/{action?}/{id?}', 'DepartmentController@list')->name('list');
            Route::post('/department', 'DepartmentController@store');
            Route::put('/department/{id}', 'DepartmentController@update');
            Route::delete('/department', 'DepartmentController@delete');
        }
    );
    Route::name('user.')->group(
        function () {
            Route::get('/users/{action?}/{id?}', 'UserController@list')->name('list');
            Route::post('/user', 'UserController@store');
            Route::put('/user/{id}', 'UserController@update');
            Route::delete('/user', 'UserController@delete');
            Route::get('/user/reset/{id}', 'UserController@reset')->name('reset');
        }
    );
    Route::name('ipaddress.')->group(
        function () {
            Route::get('/ips/{action?}/{id?}', 'IpaddressController@list')->name('list');
            Route::post('/ip', 'IpaddressController@store');
            Route::put('/ip/{id}', 'IpaddressController@update');
            Route::delete('/ip', 'IpaddressController@delete');
        }
    );
    Route::name('status.')->group(
        function () {
            Route::get('/statuses/{action?}/{id?}', 'StatusController@list')->name('list');
            Route::post('/status', 'StatusController@store');
            Route::put('/status/{id}', 'StatusController@update');
            Route::delete('/status', 'StatusController@delete');
        }
    );
    Route::name('statistics.')->group(
        function () {
            Route::get('/statistics', 'StatisticsController@list')->name('list');
        }
    );
    Route::name('project.')->group(
        function () {
            Route::get('/projects/{action?}/{id?}', 'ProjectController@list')->name('list');
            Route::post('/project', 'ProjectController@store');
            Route::put('/project/{id}', 'ProjectController@update');
            Route::delete('/project', 'ProjectController@delete');
        }
    );
});
