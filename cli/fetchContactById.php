<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/config.php';

use Controlle\Controlle;

try {
    $client = new Controlle($config);

    if (!isset($argv[1])) {
        die('informe o ID do contato');
    }

    var_dump($client->fetchContactById($argv[1]));
} catch(\Exception $err) {
    echo $err->getMessage();
}
