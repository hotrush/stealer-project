<?php

namespace App\Items;

use Hotrush\Stealer\ItemInterface;

abstract class BaseItem implements ItemInterface
{
    /**
     * Basic setter/getter method.
     * Use setExampleProperty($value) to set $exampleProperty value.
     * Use getExampleProperty($value) to get $exampleProperty value.
     *
     * @param $name
     * @param $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        if (strpos($name, 'set') === 0) {
            $propertyName = lcfirst(str_replace('set', null, $name));
            if (!property_exists($this, $propertyName))
            {
                throw new \InvalidArgumentException('No argument '.$propertyName.' in item exist.');
            }
            $this->$propertyName = $args[0];
        } else if (strpos($name, 'get') === 0) {
            $propertyName = lcfirst(str_replace('get', null, $name));
            if (!property_exists($this, $propertyName))
            {
                throw new \InvalidArgumentException('No argument '.$propertyName.' in item exist.');
            }

            return $this->$propertyName;
        } else {
            throw new \InvalidArgumentException('Invalid method called');
        }
    }
}
