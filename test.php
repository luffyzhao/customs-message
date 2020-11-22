<?php


use GuzzleHttp\Client;
use LCustoms\Entry\CEB625Message;
use LCustoms\Entry\CEB625Message\InvtRefundHead;
use LCustoms\Entry\Transfer;
use luffyzhao\db\Db;

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/../vendor/autoload.php';
/**
 * 测试读写分离和分布式
 */
$database = [
    // 数据库类型
    'type' => 'mysql',
    // 服务器地址
    'hostname' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    // 数据库名
    'database' => 'xxxxxxxxxxxxxxxxx',
    // 用户名
    'username' => 'xxxxxxxxxxxxxxx',
    // 密码
    'password' => 'xxxxxxxxxxxxx',
    // 端口
    'hostport' => 'xxxxxxxxxxxxxxx',
    // 分布式
    'deploy' => 1,
    // 读写分享
    'rw_separate' => false,
    // 调试
    'debug' => function ($messgaes) {
        echo "[" . date('Y-m-d H:i:s') . "]" . $messgaes . "\n";
    },
];

$transfer = new Transfer();
$transfer->dxpId = 'DXPENT0000022462';
$transfer->copCode = '430166K046';
$transfer->copName = '长沙斑鹿供应链管理服务有限公司';
$transfer->dxpMode = 'DXP';

$db = new Db($database);

$res = $db->table('orders')->where('ref_tracking_number', 'IN', [
    '77120730364526', '77120730370637', '77120730364595', '77120730364450', '77120730369464', '77120730366664', '77120730364687', '77120730364488', '77120730365086', '77120730370001', '77120730368297', '77120730369000', '77120730364291', '77120730368401', '77120730368945', '77120730376464', '77120730370545', '77120730364659', '77120730364817', '77120730368800', '77120730371539', '77120730364911', '77120730368999', '77120730369209', '77120730369967', '77120730368838', '77120730365244', '77120730363851', '77120730371475', '77120730376449', '77120730365111', '77120730365137', '77120730364368', '77120730371725', '77120730368904', '77120730365203', '77120730364207', '77120730364506', '77120730371804', '77120730365349', '77120730376727', '77120730363877', '77120730368414', '77120730364690', '77120730365257'
])->findAll();

foreach ($res as $re) {
    $shipBatchs = $db->table('ftp_message_shipbatch_order')
        ->where('order_code', '=', $re['order_code'])
        ->findAll();
    $orderBuyers = $db->table('order_buyer')
        ->where('order_code', '=', $re['order_code'])
        ->findAll();

    $orderProducts = $db->table('order_product')
        ->where('order_code', '=', $re['order_code'])
        ->findAll();

    if(empty($shipBatchs)){
        echo "你\n";
    }else{
        $shipBatch = $shipBatchs[0];
        $orderBuyer = $orderBuyers[0];

        $header = new InvtRefundHead();
        $header->customsCode = '4921';
        $header->appType = 2;
        $header->orderNo = $re['reference_no'];
        $header->ebpCode = $re['ebp_code'];
        $header->ebpName = $re['ebp_name'];
        $header->ebcCode = $re['ebc_code'];
        $header->ebcName = $re['ebc_name'];
        $header->logisticsNo = $re['ref_tracking_number'];
        $header->logisticsCode = '3122480063';
        $header->logisticsName = '上海大誉国际物流有限公司';
        $header->copNo = $re['order_code'];
        $header->invtNo = $shipBatch['form_id_port'];
        $header->buyerIdType = '1';
        $header->buyerIdNumber = $orderBuyer['buyer_id_no'];
        $header->buyerName = $orderBuyer['buyer_name'];
        $header->buyerTelephone = $orderBuyer['buyer_phone'];
        $header->agentCode = '430166K046';
        $header->agentName = '长沙斑鹿供应链管理服务有限公司';
        $header->reason = '用不上拍错了';
        $header->note = '';
        $message = new CEB625Message($header);

        foreach ($orderProducts as $key=>$item){

            $products = $db->table('product')
                ->where('product_id', '=', $item['product_id'])
                ->findAll();
            $product = $products[0];

            $list = new CEB625Message\InvtRefundList();
            $list->gnum = $key+1;
            $list->unit = $product['pu_code'];
            $list->qty = $item['op_quantity'];
            $list->gname =$product['hs_goods_name'];
            $list->gcode =$product['hs_code'];
            $message->addInvtRefundList($list);
        }

        $me = new \LCustoms\Message($transfer);
        $string = $me->map([$message], 'CEB625Message');


        $client = new Client();

        $response = $client->request('POST', 'http://kjds.cssinglewindow.com/KJPOSTWEB/', [
            'form_params' => [
                'data' => base64_encode($string)
            ]
        ]);
        if($response->getBody()->getContents() !== 'true'){
            echo $response->getBody()->getContents() ."\n";
        }else{
            echo $string . "\n";
            var_dump($response->getBody()->getContents());
        }
    }


}
