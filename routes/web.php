<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['as' => 'home', function () use ($router) {
    #return $router->app->version();
    return "Scoville Articles API (0.1)";
}]);

$router->get('api', function () use ($router) {
    return redirect()->route('home');
});
$router->get('api/v1', function () use ($router) {
    return redirect()->route('home');
});
$router->get('api/v1/articles', function () use ($router) {
    return redirect()->route('home');
});


$router->get('api/v1/articles/list','ArticleController@list');  #
$router->post('api/v1/articles/create','ArticleController@create'); #  
$router->get('api/v1/articles/create','ArticleController@create'); #  
$router->get('api/v1/articles/view/{id}','ArticleController@view'); # 
$router->put('api/v1/articles/edit/{id}','ArticleController@edit');
$router->get('api/v1/articles/edit/{id}','ArticleController@edit');