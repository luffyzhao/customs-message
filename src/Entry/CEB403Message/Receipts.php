<?php


namespace LCustoms\Entry\CEB403Message;


use Illuminate\Support\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Receipts
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $ebpCode;
    public $ebpName;
    public $ebcCode;
    public $ebcName;
    public $orderNo;
    public $payNo;
    public $payCode;
    public $payName;
    public $charge;
    public $currency;
    public $accountingDate;

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
    public function getBody()
    {
        return [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('ebpCode') => $this->ebpCode,
            Message::getNsKey('ebpName') => $this->ebpName,
            Message::getNsKey('ebcCode') => $this->ebcCode,
            Message::getNsKey('ebcName') => $this->ebcName,
            Message::getNsKey('orderNo') => $this->orderNo,
            Message::getNsKey('pay_no') => $this->payNo,
            Message::getNsKey('payCode') => $this->payCode,
            Message::getNsKey('payName') => $this->payName,
            Message::getNsKey('charge') => $this->charge,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('accountingDate') => $this->accountingDate,
        ];
    }
}
