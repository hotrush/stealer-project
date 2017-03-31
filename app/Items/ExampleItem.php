<?php

namespace App\Items;

use Hotrush\Stealer\AdaptersRegistry;

class ExampleItem extends BaseItem
{
    private $exampleProperty;

    /**
     * Method that do the magic with collected item - save it into database or send to queue.
     *
     * @param AdaptersRegistry $adaptersRegistry
     */
    public function processItem(AdaptersRegistry $adaptersRegistry)
    {
        $beanstalk = $adaptersRegistry->getAdapter('beanstalk');
        $beanstalk->put(serialize($this));
    }
}
