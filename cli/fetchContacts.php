<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/config.php';

use Controlle\Controlle;

try {
    $client = new Controlle($config);

    var_dump($client->fetchContacts());
} catch(\Exception $err) {
    echo $err->getMessage();
}
