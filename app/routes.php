<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});*/

Route::group(['before' => 'auth.basic'], function () {
    Route::get('/', array('uses'=>'ArticlesController@index'));
    Route::get('article/new_store', array('as'=>'new_article', 'uses' => 'ArticlesController@new_store'));
    Route::post('article/new_store', array('as'=>'new_article', 'uses' => 'ArticlesController@new_store_add'));
    Route::get('articles', array('as'=>'articles', 'uses' =>'ArticlesController@all'));
    Route::get('article/new', array('as'=>'new_article', 'uses' => 'ArticlesController@new_article'));
    Route::post('article/create', array('uses'=>'ArticlesController@create'));
    Route::get('services/stores', array('uses' => 'ArticleController@stores'));
    Route::get('services/articles', array('uses' => 'ArticleController@index'));
    Route::resource('services', 'ArticleController');
    Route::get('services/articles/store/{id}', array('uses' => 'ArticleController@articles_by_store'));
});

Route::filter('auth.basic', function()
{
    return Auth::basic();
});

Route::any( '{catchall}', function ( $page ) {
    $response = array(  'success'    => false,
                        'error_code' => 404,
                        'error_msg'  =>'Record not found');
    return Response::json ($response);    
} )->where('catchall', '(.*)');
