<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/config.php';

use Controlle\Controlle;
use Controlle\models\Contact;

try {
    $client = new Controlle($config);

    if (!isset($argv[1])) {
        die('informe o ID do contato');
    }

    var_dump($client->updateContact(
        $argv[1], (new Contact())->setEmail('lilianodamata@example.com')->setName('Liliano Mata')
    ));
} catch(\Exception $err) {
    echo $err->getMessage();
}
