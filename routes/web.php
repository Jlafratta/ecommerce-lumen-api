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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

# /api
$router->group(['prefix' => 'api'], function() use ($router) {
    # /
    $router->get('', function () { return ["version" => env('API_VERSION')]; });
    # /register
    $router->post('register', 'AuthController@register');
    # /login
    $router->post('login', 'AuthController@login');

    # /user
    $router->group(['prefix' => 'user', 'middleware' => 'auth'], function() use ($router) {
        # /logged
        $router->get('/logged', 'UserController@loggedUser');
        # /
        $router->get('', 'UserController@getAll');
        # /{id}
        $router->get('/{id}', 'UserController@get');

    });

});
