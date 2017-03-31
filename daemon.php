<?php

require_once 'bootstrap.php';

$loop = React\EventLoop\Factory::create();

$adaptersRegistry = \Hotrush\Stealer\Config::loadAdapters(ROOT_PATH.'config'.DIRECTORY_SEPARATOR.'adapters.php', $loop);
$registry = \Hotrush\Stealer\Config::loadRegistry(ROOT_PATH.'config'.DIRECTORY_SEPARATOR.'spiders.php');

// log to STDOUT by default, check for other handlers https://github.com/Seldaek/monolog/blob/master/doc/02-handlers-formatters-processors.md
$logger = new \Monolog\Logger('stealer', [new \Monolog\Handler\StreamHandler(STDOUT)]);

// create client instance
//$client = new \Hotrush\Stealer\Client\Scrapoxy($loop, $logger);
$client = new \Hotrush\Stealer\Client\Guzzle($loop, $logger);

// Run all the magic
$coordinator = new \Hotrush\Stealer\Coordinator($registry, $loop, $client, $adaptersRegistry, $logger);
$coordinator->run();
