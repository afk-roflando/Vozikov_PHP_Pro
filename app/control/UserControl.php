<?php

namespace App\control;

use Core\control;

class UserControl extends control
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function before(string $action, array $params = []): bool
    {
        return parent::before($action, $params);
    }
}
