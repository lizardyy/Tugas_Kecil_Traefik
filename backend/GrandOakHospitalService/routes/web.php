<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/grandoak', function () use ($router) {
//     return "This is Grand Oak Hospital Service";
// });
$router->group(['prefix' => 'grandoak'], function () use ($router) {
    $router->get('/', 'GrandOakHospitalController@index');
    $router->get('/getdoctor/{doctorType}', 'GrandOakHospitalController@getDoctor');

});