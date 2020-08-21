<?php


namespace LCustoms\Entry\CEB626Message;


use LCustoms\Message;
use Ramsey\Uuid\Uuid;

class InvtRefundReturn
{
    public $guid;
    public $customsCode;
    public $agentCode;
    public $ebpCode;
    public $ebcCode;
    public $copNo;
    public $preNo;
    public $invtNo;
    public $returnStatus;
    public $returnTime;
    public $returnInfo;

    public function __construct()
    {
        $this->guid = Uuid::uuid4()->toString();
    }

    public function getBody()
    {
        return [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('customsCode') => $this->customsCode,
            Message::getNsKey('agentCode') => $this->agentCode,
            Message::getNsKey('ebpCode') => $this->ebpCode,
            Message::getNsKey('ebcCode') => $this->ebcCode,
            Message::getNsKey('copNo') => $this->copNo,
            Message::getNsKey('preNo') => $this->preNo,
            Message::getNsKey('invtNo') => $this->invtNo,
            Message::getNsKey('returnStatus') => $this->returnStatus,
            Message::getNsKey('returnTime') => $this->returnTime,
            Message::getNsKey('returnInfo') => $this->returnInfo,
        ];
    }

}