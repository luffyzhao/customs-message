<?php


namespace LCustoms\Entry\CEB505Message;


use Illuminate\Support\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;

class Logistics
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $logisticsCode;
    public $logisticsName;
    public $logisticsNo;
    public $freight;
    public $insuredFee;
    public $currency;
    public $grossWeight;
    public $packNo;
    public $goodsInfo;

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
            Message::getNsKey('logisticsCode') => $this->logisticsCode,
            Message::getNsKey('logisticsName') => $this->logisticsName,
            Message::getNsKey('logisticsNo') => $this->logisticsNo,
            Message::getNsKey('freight') => $this->freight,
            Message::getNsKey('insuredFee') => $this->insuredFee,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('grossWeight') => $this->grossWeight,
            Message::getNsKey('packNo') => $this->packNo,
            Message::getNsKey('goodsInfo') => $this->goodsInfo,
        ];
    }
}