<?php

namespace App\Control;

use Core\Controller;

class UserControl extends Controller
{
    public function store()
    {
        return requestBody();
    }
}