<?php

use core\router;

router::add(
    'users/{id:\d+}/edit',
    [
        'control' => \App\control\UserControl::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);
