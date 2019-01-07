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

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect( url()->previous());
});

Route::group(['namespace'=>'Client'],function() {
    //home
    Route::get('/', 'HomeController@index');
    Route::get('/qua-tang-socola', 'HomeController@Socola');
});

Route::group(['namespace'=>'Admin'],function() {
    Route::group(['prefix'=>'admin', 'as' => 'admin.'],function() {
        // user
        Route::get('/user/', 'UsersController@getList');
        Route::get('/user/detail/{id}', 'UsersController@getFind');
        Route::get('/user/create', 'UsersController@getCreate');
        Route::post('/user/create', 'UsersController@postCreate');
        Route::get('/user/update/{id}', 'UsersController@getUpdate');
        Route::put('/user/update/{id}', 'UsersController@postUpdate');
        Route::get('/user/all-trash', 'UsersController@getAllTrash');
        Route::get('/user/trash/{id}', 'UsersController@getTrash');
        Route::get('/user/recover/{id}', 'UsersController@getRecover');
        Route::get('/user/delete/{id}', 'UsersController@getDelete');
        // news
        Route::get('/news/', 'NewsController@getList');
        Route::get('/news/detail/{id}', 'NewsController@getFind');
        Route::get('/news/create', 'NewsController@getCreate');
        Route::post('/news/create', 'NewsController@postCreate');
        Route::get('/news/update/{id}', 'NewsController@getUpdate');
        Route::put('/news/update/{id}', 'NewsController@postUpdate');
        Route::get('/news/all-trash', 'NewsController@getAllTrash');
        Route::get('/news/trash/{id}', 'NewsController@getTrash');
        Route::get('/news/recover/{id}', 'NewsController@getRecover');
        Route::get('/news/delete/{id}', 'NewsController@getDelete');
        // categories
        Route::get('/categories/', 'NewsCategoriesController@getList');
        Route::get('/categories/detail/{id}', 'NewsCategoriesController@getFind');
        Route::get('/categories/create', 'NewsCategoriesController@getCreate');
        Route::post('/categories/create', 'NewsCategoriesController@postCreate');
        Route::get('/categories/update/{id}', 'NewsCategoriesController@getUpdate');
        Route::put('/categories/update/{id}', 'NewsCategoriesController@postUpdate');
        Route::get('/categories/all-trash', 'NewsCategoriesController@getAllTrash');
        Route::get('/categories/trash/{id}', 'NewsCategoriesController@getTrash');
        Route::get('/categories/recover/{id}', 'NewsCategoriesController@getRecover');
        Route::get('/categories/delete/{id}', 'NewsCategoriesController@getDelete');
        // languages
        Route::get('/languages/', 'LanguagesController@getList');
        Route::get('/languages/detail/{id}', 'LanguagesController@getFind');
        Route::get('/languages/create', 'LanguagesController@getCreate');
        Route::post('/languages/create', 'LanguagesController@postCreate');
        Route::get('/languages/update/{id}', 'LanguagesController@getUpdate');
        Route::put('/languages/update/{id}', 'LanguagesController@postUpdate');
        Route::get('/languages/all-trash', 'LanguagesController@getAllTrash');
        Route::get('/languages/trash/{id}', 'LanguagesController@getTrash');
        Route::get('/languages/recover/{id}', 'LanguagesController@getRecover');
        Route::get('/languages/delete/{id}', 'LanguagesController@getDelete');
        // roles
        Route::get('/roles/', 'RolesController@getList');
        Route::get('/roles/detail/{id}', 'RolesController@getFind');
        Route::get('/roles/create', 'RolesController@getCreate');
        Route::post('/roles/create', 'RolesController@postCreate');
        Route::get('/roles/update/{id}', 'RolesController@getUpdate');
        Route::put('/roles/update/{id}', 'RolesController@postUpdate');
        Route::get('/roles/all-trash', 'RolesController@getAllTrash');
        Route::get('/roles/trash/{id}', 'RolesController@getTrash');
        Route::get('/roles/recover/{id}', 'RolesController@getRecover');
        Route::get('/roles/delete/{id}', 'RolesController@getDelete');
        //resource
        Route::get('/resources/', 'ResourcesController@getList');
        Route::get('/resources/find/{id}', 'ResourcesController@getFind');
        Route::get('/resources/create', 'ResourcesController@getCreate');
        Route::post('/resources/create', 'ResourcesController@postCreate');
        Route::get('/resources/update/{id}', 'ResourcesController@getUpdate');
        Route::put('/resources/update/{id}', 'ResourcesController@postUpdate');
        Route::get('/resources/all-trash', 'ResourcesController@getAllTrash');
        Route::get('/resources/trash/{id}', 'ResourcesController@getTrash');
        Route::get('/resources/recover/{id}', 'ResourcesController@getRecover');
        Route::get('/resources/delete/{id}', 'ResourcesController@getDelete');
        //transactions
        Route::get('/transactions/', 'TransactionsController@getList');
        Route::get('/transactions/find/{id}', 'TransactionsController@getFind');
        Route::get('/transactions/create', 'TransactionsController@getCreate');
        Route::post('/transactions/create', 'TransactionsController@postCreate');
        Route::get('/transactions/update/{id}', 'TransactionsController@getUpdate');
        Route::put('/transactions/update/{id}', 'TransactionsController@postUpdate');
        Route::get('/transactions/all-trash', 'TransactionsController@getAllTrash');
        Route::get('/transactions/trash/{id}', 'TransactionsController@getTrash');
        Route::get('/transactions/recover/{id}', 'TransactionsController@getRecover');
        Route::get('/transactions/delete/{id}', 'TransactionsController@getDelete');
    });
});
Auth::routes();
