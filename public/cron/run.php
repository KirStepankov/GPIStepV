<?php
use GPIStepV\Controllers\RPS;
use GPIStepV\Models\RPSModelRequest;
use Monolog\Logger;

$requestModel = new RPSModelRequest('http://stepv.ru/');

$requestModel
    ->setLocale('ru')
    ->setStrategy('desktop')
    ->setCategory(['performance']);

// Create the logger
$logger = new Logger('myRequests');

$rps = new RPS($requestModel, $logger);
echo '<pre>';
print_r($rps->getData());
echo '</pre>';