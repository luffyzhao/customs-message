<?php

use LCustoms\Entry\CEB311Message;
use LCustoms\Entry\CEB625Message\InvtRefundList;
use LCustoms\Entry\CEB625Message;
use LCustoms\Entry\Transfer;
use LCustoms\Message;

include_once __DIR__ . '/../vendor/autoload.php';


$invt  = new CEB625Message\InvtRefundHead();

$invt->customsCode = "关区代码";
$invt->orderNo = "订单号";
$invt->ebpCode = "平台代码";
$invt->ebpName = "平台名称";
$invt->ebcCode = "电商代码";
$invt->ebcName = "电商名称";
$invt->logisticsNo = "物流单号";
$invt->logisticsCode = "物流企业代码";
$invt->logisticsName = "物流企业名称";
$invt->copNo = "企业内部编号";
$invt->invtNo = "清单编号";
$invt->buyerIdType = 1;
$invt->buyerIdNumber ='订购人证件号码';
$invt->buyerName = "订购人名称";
$invt->buyerTelephone ="订购人电话";
$invt->agentCode = "申报企业代码";
$invt->agentName = "申报企业名称";
$invt->reason = "退货原因";

$ceb625 = new CEB625Message($invt);


for ($i=0; $i<2; $i++){
    $list = new InvtRefundList();
    $list->gnum = $i+1;
    $list->gcode = '商品编码';
    $list->gname = '商品名称';
    $list->qty = '数量';
    $list->unit = '计量单位';

    $ceb625->addInvtRefundList(
        $list
    );

}

$transfer =  new Transfer;
$transfer->copCode = "申报企业代码";
$transfer->copName = "申报企业名称";
$transfer->dxpId = "dxpid";
$transfer->dxpMode = "DXP";

$ceb625->setTransfer($transfer);

echo $ceb625;