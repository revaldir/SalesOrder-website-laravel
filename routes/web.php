<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'active'], 'as' => 'user.'], function () {
    Route::resource('budgets', 'Frontend\BudgetController');
    Route::resource('outflows', 'Frontend\OutflowController');
    Route::resource('reports', 'Frontend\ReportController');
    Route::resource('users', 'Frontend\UserController');
    Route::get('reports/{report}/{category}', 'Frontend\ReportController@showCat')->name('show.cat');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isadmin']], function () {
    Route::get('home', 'HomeController@admin')->name('home.admin');
    Route::resource('budgets', 'Admin\BudgetController');
    Route::resource('outflows', 'Admin\OutflowController');
    Route::resource('reports', 'Admin\ReportController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('tests', 'ReportController');
    Route::patch('home/{user}', 'HomeController@approve')->name('home.approve');
    Route::post('import', 'Admin\BudgetController@import')->name('budget.import');
    Route::get('reports/{report}/{category}', 'Admin\ReportController@showCat')->name('show.cat');
});

Route::group(['prefix' => 'dt', 'middleware' => ['auth', 'isadmin']], function () {
    Route::get('budgets', 'Admin\BudgetController@dataTables')->name('budgets.dt');
    Route::get('outflows', 'Admin\OutflowController@dataTables')->name('outflows.dt');
    Route::get('users', 'Admin\UserController@dataTables')->name('users.dt');
    Route::post('reports', 'ReportController@refresh')->name('update.btn');
});

Route::group(['prefix' => 'userdt', 'middleware' => 'auth'], function () {
    Route::get('budgets', 'Frontend\BudgetController@dataTables')->name('user.budgets.dt');
    Route::get('outflows', 'Frontend\OutflowController@dataTables')->name('user.outflows.dt');
});
