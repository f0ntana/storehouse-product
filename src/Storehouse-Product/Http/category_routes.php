<?php
/** @var \Illuminate\Routing\Router $router */
/** @security \ResultSystems\SecurityRouter\Services\ServiceRouter $service */
//namespace \ResultSystems\Storehouse\Product\Http\Controllers

/**
 * Storehouse Product Category
 */

$router->get('/search',
     $security
        ->setFixedSecurity(['as' => 'search', 'uses' => 'ProductCategoryController@search'])
        ->getConfig('storehouse-product', 'category.search'));
$router->get('',
    $security
        ->setFixedSecurity(['as' => 'create', 'uses' => 'ProductCategoryController@create'])
        ->getConfig('storehouse-product', 'category.create'));
$router->get('/{product}',
    $security
        ->setFixedSecurity(['as' => 'show', 'uses' => 'ProductCategoryController@show'])
        ->getConfig('storehouse-product', 'category.show'))->where('product', '[0-9]+');
$router->post('',
    $security
        ->setFixedSecurity(['as' => 'store', 'uses' => 'ProductCategoryController@store'])
        ->getConfig('storehouse-product', 'category.store'));
$router->put('/{product}',
    $security
        ->setFixedSecurity(['as' => 'edit', 'uses' => 'ProductCategoryController@update'])
        ->getConfig('storehouse-product', 'category.update'))->where('product', '[0-9]+');
$router->delete('/{product}',
    $security
        ->setFixedSecurity(['as' => 'delete', 'uses' => 'ProductCategoryController@destroy'])
        ->getConfig('storehouse-product', 'category.delete'))->where('product', '[0-9]+');
