<?php

use LCustoms\Entry\CEB311Message;
use LCustoms\Entry\Transfer;
use LCustoms\Message;

include_once __DIR__ . '/../vendor/autoload.php';


$orderHead = new CEB311Message\OrderHead();
$orderHead->ebcName = "aaa";
//  参数

$ceb311 = new CEB311Message($orderHead);

$list = new CEB311Message\OrderList();
// 参数


$ceb311->addOrderList(
    $list
);


$message = new Message(
    new Transfer
);

echo (string)$message->map([$ceb311], 'CEB311Message');
