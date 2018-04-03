<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/config.php';

use Controlle\Controlle;
use Controlle\models\Contact;

try {
    $client = new Controlle($config);

    var_dump($client->createContact(
      (new Contact())->setType(Contact::TYPE_CLIENT)->setEmail('liliano.damata@example.com')->setName('Liliano da Mata')
    ));
} catch(\Exception $err) {
    echo $err->getMessage();
}
