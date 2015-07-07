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

Route::get('/', array('uses'=>'ArticlesController@index'));
Route::get('articles', array('as'=>'articles', 'uses' =>'ArticlesController@all'));
Route::get('article/new', array('as'=>'new_article', 'uses' => 'ArticlesController@new_article'));
Route::get('article/{id}', array('as'=>'article', 'uses' => 'ArticlesController@ArticleById'));
Route::post('article/create', array('uses'=>'ArticlesController@create'));

Route::resource('api', 'ArticleController');
