<?php
 include_once __DIR__ . '/vendor/autoload.php';

$inventory = new LCustoms\Entry\Inventory(
    new LCustoms\Entry\Inventory\InventoryHead
);
$inventory->addInventoryList(new LCustoms\Entry\Inventory\InventoryList);

$message = new LCustoms\Message(new LCustoms\Entry\Transfer);

echo $message->map([$inventory]);