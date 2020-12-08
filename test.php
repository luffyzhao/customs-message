<?php


use GuzzleHttp\Client;
use LCustoms\Entry\CEB625Message;
use LCustoms\Entry\CEB625Message\InvtRefundHead;
use LCustoms\Entry\Transfer;
use luffyzhao\db\Db;

include_once __DIR__ . '/vendor/autoload.php';


$string = "<CEB622Message>
  <InventoryReturn>
    <guid>b85c2f00-0dec-4507-9410-1fd57d214153</guid>
    <customsCode>4921</customsCode>
    <ebpCode>4301364765</ebpCode>
    <ebcCode>4301364765</ebcCode>
    <agentCode>430166K046</agentCode>
    <copNo>SOC03820021319</copNo>
    <preNo>B20201208796651782</preNo>
    <invtNo>49212020I046118061</invtNo>
    <returnStatus>800</returnStatus>
    <returnTime>20201208172711594</returnTime>
    <returnInfo>[Code:2600;Desc:放行]</returnInfo>
  </InventoryReturn>
  <InventoryReturn>
    <guid>b85c2f00-0dec-4507-9410-1fd57d214153</guid>
    <customsCode>4921</customsCode>
    <ebpCode>4301364765</ebpCode>
    <ebcCode>4301364765</ebcCode>
    <agentCode>430166K046</agentCode>
    <copNo>SOC03820021319</copNo>
    <preNo>B20201208796651782</preNo>
    <invtNo>49212020I046118061</invtNo>
    <returnStatus>800</returnStatus>
    <returnTime>20201208172711594</returnTime>
    <returnInfo>[Code:2600;Desc:放行]</returnInfo>
  </InventoryReturn>
</CEB622Message>";

$response = new \LCustoms\Response($string);

print_r($response->getItems());