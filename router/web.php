<?php

use core\router;

Router::add(
    'users',
    [
        'controller' => \App\Control\UserControl::class,
        'action' => 'index',
        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}',
    [
        'controller' => \App\Control\UserControl::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}/edit',
    [

        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}/update',
    [
        'controller' => \App\Control\UserControl::class,
        'action' => 'update',
        'method' => 'POST'
    ]
);

Router::add(
    'posts/{post_id:\d+}/comment/{comment_id:\d+}',
    [
        'controller' => \App\control\UserControl::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);