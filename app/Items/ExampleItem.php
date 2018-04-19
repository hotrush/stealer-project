<?php

namespace App\Items;

use Hotrush\Stealer\AdaptersRegistry;

class ExampleItem extends BaseItem
{
    /**
     * Any defined item property
     *
     * @var mixed
     */
    private $exampleProperty;

    /**
     * Method that do the magic with collected item - save it into database or send to queue.
     *
     * @param AdaptersRegistry $adaptersRegistry
     */
    public function processItem(AdaptersRegistry $adaptersRegistry)
    {
        $exampleAdapter = $adaptersRegistry->getAdapter('example');
        $exampleAdapter->doSmth(serialize($this));
    }
}
