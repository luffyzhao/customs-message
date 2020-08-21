<?php


namespace LCustoms\Entry\CEB625Message;


use Carbon\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InvtRefundHead implements XmlSerializable
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $customsCode;
    public $orderNo;
    public $ebpCode;
    public $ebpName;
    public $ebcCode;
    public $ebcName;
    public $logisticsNo;
    public $logisticsCode;
    public $logisticsName;
    public $copNo;
    public $invtNo;
    public $buyerIdType;
    public $buyerIdNumber;
    public $buyerName;
    public $buyerTelephone;
    public $agentCode;
    public $agentName;
    public $reason;

    public function __construct()
    {
        try {
            $this->guid = Uuid::uuid4()->toString();
        } catch (\Exception $e) {
        }
        $this->appTime = Carbon::now()->format('YmdHis');
        $this->appStatus = 2;
        $this->appType = 1;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * Use the $writer argument to write its own xml serialization.
     *
     * An important note: do _not_ create a parent element. Any element
     * implementing XmlSerializble should only ever write what's considered
     * its 'inner xml'.
     *
     * The parent of the current element is responsible for writing a
     * containing element.
     *
     * This allows serializers to be re-used for different element names.
     *
     * If you are opening new elements, you must also close them again.
     * @param Writer $writer
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->writeElement(Message::getNsKey('InvtRefundHead'), [
            Message::getNsKey('guid')=>$this->guid,
            Message::getNsKey('appType')=>$this->appType,
            Message::getNsKey('appTime')=>$this->appTime,
            Message::getNsKey('appStatus')=>$this->appStatus,
            Message::getNsKey('customsCode')=>$this->customsCode,
            Message::getNsKey('orderNo')=>$this->orderNo,
            Message::getNsKey('ebpCode')=>$this->ebpCode,
            Message::getNsKey('ebpName')=>$this->ebpName,
            Message::getNsKey('ebcCode')=>$this->ebcCode,
            Message::getNsKey('ebcName')=>$this->ebcName,
            Message::getNsKey('logisticsNo')=>$this->logisticsNo,
            Message::getNsKey('logisticsCode')=>$this->logisticsCode,
            Message::getNsKey('logisticsName')=>$this->logisticsName,
            Message::getNsKey('copNo')=>$this->copNo,
            Message::getNsKey('invtNo')=>$this->invtNo,
            Message::getNsKey('buyerIdType')=>$this->buyerIdType,
            Message::getNsKey('buyerIdNumber')=>$this->buyerIdNumber,
            Message::getNsKey('buyerName')=>$this->buyerName,
            Message::getNsKey('buyerTelephone')=>$this->buyerTelephone,
            Message::getNsKey('agentCode')=>$this->agentCode,
            Message::getNsKey('agentName')=>$this->agentName,
            Message::getNsKey('reason')=>$this->reason,
        ]);
    }
}