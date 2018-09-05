<?php

/** @var Route $router */
$router->get('audits', [
    'as' => 'audit.index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

$router->get('audits/{id}', [
    'as' => 'audit.show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
