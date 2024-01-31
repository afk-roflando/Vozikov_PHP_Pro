<?php
\Core\Router::add('api/auth/registration', [
    'controller' => \App\Control\Api\AuthControl::class,
    'action' => 'signup',
    'method' => 'POST'

]);

\Core\Router::add('api/auth/login', [
    'controller' => \App\Control\Api\AuthControl::class,
    'action' => 'signin',
    'method' => 'POST'

]);
\Core\Router::add('api/folders', [
    'controller' => \App\Control\Api\FoldersController::class,
    'action' => 'index',
    'method' => 'GET'

]);
\Core\Router::add('api/folders/{id:\d+}', [
    'controller' => \App\Control\Api\FoldersController::class,
    'action' => 'show',
    'method' => 'GET'
]);
\Core\Router::add('api/folders/store', [
    'controller' => \App\Control\Api\FoldersController::class,
    'action' => 'store',
    'method' => 'POST'
]);

\Core\Router::add('api/folders/{id:\d+}/update', [
    'controller' => \App\Control\Api\FoldersController::class,
    'action' => 'update',
    'method' => 'PUT'
]);

\Core\Router::add('api/folders/{id:\d+}/destroy', [
    'controller' => \App\Control\Api\FoldersController::class,
    'action' => 'destroy',
    'method' => 'DELETE'
]);