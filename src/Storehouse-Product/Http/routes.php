<?php
/** @var \Illuminate\Routing\Router $router */
$router->get('/search', [
    'as' => 'search',
    'uses' => 'ProductController@search',
]);
$options=$security
    ->setFixedSecurity(['uses' => 'ProductController@index', 'as'=>'index'])
    ->getConfig('storehouse-product', 'create');
$router->get('/', $options);
$router->get('{product}', [
    'any'=>true,
    'as' => 'show',
    'uses' => 'ProductController@show',
])->where('product', '[0-9]+');
$router->post('/', [
    'any'=>true,
    'as' => 'create',
    'uses' => 'ProductController@create',
]);
$router->put('/{product}', [
    'any'=>true,
    'as' => 'edit',
    'uses' => 'ProductController@update',
])->where('product', '[0-9]+');
$router->delete('/{product}', [
    'as' => 'delete',
    'uses' => 'ProductController@destroy',
])->where('product', '[0-9]+');

/**
 * Storehouse API
 */
$router->group(['prefix' => 'api'], function () use ($router) {

    // Fetch all roles
    //$router->get('roles', 'ResultSystems\ResultSystems\Storehouse\Controllers\API\RolesController@index');

});
