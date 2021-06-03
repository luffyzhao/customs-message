<?php


namespace LCustoms\Entry\CEB311Message;


use Carbon\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class OrderHead implements XmlSerializable
{

    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $orderType;
    public $orderNo;
    public $ebpCode;
    public $ebpName;
    public $ebcCode;
    public $ebcName;
    public $goodsValue;
    public $freight;
    public $discount;
    public $taxTotal;
    public $acturalPaid;
    public $currency;
    public $buyerRegNo;
    public $buyerName;
    public $buyerTelephone;
    public $buyerIdType;
    public $buyerIdNumber;
    public $consignee;
    public $consigneeTelephone;
    public $consigneeAddress;

    public function __construct()
    {
        $this->guid = Uuid::uuid4()->toString();
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
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->writeElement(Message::getNsKey('OrderHead'), [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('orderType') => $this->orderType,
            Message::getNsKey('orderNo') => $this->orderNo,
            Message::getNsKey('ebpCode') => $this->ebpCode,
            Message::getNsKey('ebpName') => $this->ebpName,
            Message::getNsKey('ebcCode') => $this->ebcCode,
            Message::getNsKey('ebcName') => $this->ebcName,
            Message::getNsKey('goodsValue') => $this->goodsValue,
            Message::getNsKey('freight') => $this->freight,
            Message::getNsKey('discount') => $this->discount,
            Message::getNsKey('taxTotal') => $this->taxTotal,
            Message::getNsKey('acturalPaid') => $this->acturalPaid,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('buyerRegNo') => $this->buyerRegNo,
            Message::getNsKey('buyerName') => $this->buyerName,
            Message::getNsKey('buyerTelephone') => $this->buyerTelephone,
            Message::getNsKey('buyerIdType') => $this->buyerIdType,
            Message::getNsKey('buyerIdNumber') => $this->buyerIdNumber,
            Message::getNsKey('consignee') => $this->consignee,
            Message::getNsKey('consigneeTelephone') => $this->consigneeTelephone,
            Message::getNsKey('consigneeAddress') => $this->consigneeAddress,
        ]);
    }
}
