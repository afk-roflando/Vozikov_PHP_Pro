<?php

namespace core;

class control
{
    public function before(string $action, array $params = []): bool
    {
        return true;
    }

    public function after(string $action) {}
}