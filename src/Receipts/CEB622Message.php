<?php

namespace LCustoms\Receipts;

use SimpleXMLElement;

class CEB622Message extends ReceiptBase
{
    public $guid;
    public $customsCode;
    public $ebpCode;
    public $ebcCode;
    public $agentCode;
    public $copNo;
    public $preNo;
    public $invtNo;
    public $returnStatus;
    public $returnTime;
    public $returnInfo;
}