<?php

namespace App\Adapters;

use Hotrush\Stealer\AdapterInterface;

class ExampleAdapter implements AdapterInterface
{
    public function getAdapter()
    {
        // you need to return any object instance here to use in your code
        // there are no any interfaces or smth
        // but it must work in non-blocking way!!!
    }
}
