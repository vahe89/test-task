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
/**
 * Home Routes
 */
Route::get('', function () { return redirect()->route('dashboard'); });
Route::group(['middleware' => ['guest']], function () {

    /**
     * Login Routes
     */
    Route::get('login', 'LoginController@show')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login.perform');

});

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Routes
     */
    Route::get('logout', 'LogoutController@perform')->name('logout.perform');

    /**
     * Dashboard Routes
     */
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    /**
     * Clients Routes
     */
    Route::group(['prefix' => 'clients'], function () {
        Route::get('', 'ClientsController@index')->name('clients.index');
        Route::get('create', 'ClientsController@create')->name('clients.create');
        Route::post('store', 'ClientsController@store')->name('clients.store');
        Route::get('edit/{id}', 'ClientsController@edit')->name('clients.edit');
        Route::put('update/{id}', 'ClientsController@update')->name('clients.update');
        Route::delete('delete/{id}', 'ClientsController@destroy')->name('clients.delete');
    });

    /**
     * Report Routes
     */

    Route::group(['prefix' => 'report'], function () {
        Route::get('', 'ReportController@index')->name('report.index');
        Route::get('export', 'ReportController@export')->name('report.export');
    });
});