<?php

require 'vendor/autoload.php';

define('ROOT_PATH', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
define('APP_PATH', ROOT_PATH.'app'.DIRECTORY_SEPARATOR);

\Hotrush\Stealer\Config::load(ROOT_PATH.'.env');
\Hotrush\Stealer\Config::setLogsDir(ROOT_PATH.'logs'.DIRECTORY_SEPARATOR);
