<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/config.php';

use Controlle\Controlle;
use Controlle\models\Transaction;

try {
    $client = new Controlle($config);

    var_dump($client->createTransaction(
      (new Transaction())->setDescription('Instalação Telefones')->isExpense()->setAmount(200)->setAccountId(1559729)->setCategoryId(13919866)
    ));
} catch(\Exception $err) {
    echo $err->getMessage();
}
