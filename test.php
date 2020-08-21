<?php



include_once __DIR__ . '/vendor/autoload.php';




$transfer = new LCustoms\Entry\Transfer();
$transfer->dxpId = 'DXPENT0000022462';
$transfer->dxpMode = 'DXP';
$transfer->copName = '长沙斑鹿供应链管理服务有限公司';
$transfer->copCode = '430166K046';
$message = new LCustoms\Message($transfer);

echo $message->map([$inventory]);