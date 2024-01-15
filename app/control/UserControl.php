<?php

namespace app\control;

use Core\Controller;

class UserControl extends Controller
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
