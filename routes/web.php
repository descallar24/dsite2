<?php

/* @var \Laravel\Lumen\Routing\Router $router /

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/books',['uses' => 'UserController@getBooks']);
$router->get('/books', 'UserController@index'); // get all usersrecords
$router->post('/books', 'UserController@add'); // create new userrecord
$router->get('/books/{id}', 'UserController@show'); // get user by id
$router->put('/books/{id}', 'UserController@update'); // update user 
$router->patch('/books/{id}', 'UserController@update'); // update user 
$router->delete('/books/{id}', 'UserController@delete'); // delete 

$router->get('/bookauthors', 'UserJobController@index'); 
$router->get('/bookauthors/{id}', 'UserJobController@show');
$router->post('/bookauthors', 'UserJobController@add');
$router->put('/bookauthors/{id}', 'UserJobController@update'); // update user
$router->patch('/bookauthors/{id}', 'UserJobController@update');
$router->delete('/bookauthors/{id}', 'UserJobController@delete');