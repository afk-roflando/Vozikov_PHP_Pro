<?php
\Core\Router::add('api/auth/registration', [
    'controller' => \App\Control\AuthControl::class,
    'action' => 'signup',
    'method' => 'POST'

]);

\Core\Router::add('api/auth/login', [
    'controller' => \App\Control\AuthControl::class,
    'action' => 'signin',
    'method' => 'POST'

]);

