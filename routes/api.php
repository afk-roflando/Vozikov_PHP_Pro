<?php
\Core\Router::add('api/auth/registration', [
    'controller' => \App\Control\UserControl::class,
    'action' => 'store',
    'method' => 'POST'

]);
