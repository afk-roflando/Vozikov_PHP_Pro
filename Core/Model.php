<?php

namespace Core;

use Core1\Traits\Queryable;

abstract class Model
{
    use Queryable;

    public int $id;
}