<?php


namespace LCustoms\Entry\CEB603Message;


use Carbon\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InventoryHead implements XmlSerializable
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $customsCode;
    public $ebpCode;
    public $ebpName;
    public $orderNo;
    public $logisticsCode;
    public $logisticsName;
    public $logisticsNo;
    public $copNo;
    public $ieFlag;
    public $portCode;
    public $ieDate;
    public $statisticsFlag;
    public $agentCode;
    public $agentName;
    public $ebcCode;
    public $ebcName;
    public $ownerCode;
    public $ownerName;
    public $tradeMode;
    public $trafMode;
    public $billNo;
    public $loctNo;
    public $country;
    public $POD;
    public $freight;
    public $fCurrency;
    public $fFlag;
    public $insuredFee;
    public $iCurrency;
    public $iFlag;
    public $wrapType;
    public $packNo;
    public $grossWeight;
    public $netWeight;

    public function __construct()
    {
        try {
            $this->guid = Uuid::uuid4()->toString();
        } catch (\Exception $e) {
        }
        $this->appTime = Carbon::now()->format('YmdHis');
        $this->appStatus = 2;
        $this->appType = 1;
        $this->ieDate =  Carbon::now()->format('Ymd');
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
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeElement(Message::getNsKey('InventoryHead'), [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('customsCode') => $this->customsCode,
            Message::getNsKey('ebpCode') => $this->ebpCode,
            Message::getNsKey('ebpName') => $this->ebpName,
            Message::getNsKey('orderNo') => $this->orderNo,
            Message::getNsKey('logisticsCode') => $this->logisticsCode,
            Message::getNsKey('logisticsName') => $this->logisticsName,
            Message::getNsKey('logisticsNo') => $this->logisticsNo,
            Message::getNsKey('copNo') => $this->copNo,
            Message::getNsKey('ieFlag') => $this->ieFlag,
            Message::getNsKey('portCode') => $this->portCode,
            Message::getNsKey('ieDate') => $this->ieDate,
            Message::getNsKey('statisticsFlag') => $this->statisticsFlag,
            Message::getNsKey('agentCode') => $this->agentCode,
            Message::getNsKey('agentName') => $this->agentName,
            Message::getNsKey('ebcCode') => $this->ebcCode,
            Message::getNsKey('ebcName') => $this->ebcName,
            Message::getNsKey('ownerCode') => $this->ownerCode,
            Message::getNsKey('ownerName') => $this->ownerName,
            Message::getNsKey('tradeMode') => $this->tradeMode,
            Message::getNsKey('trafMode') => $this->trafMode,
            Message::getNsKey('billNo') => $this->billNo,
            Message::getNsKey('loctNo') => $this->loctNo,
            Message::getNsKey('country') => $this->country,
            Message::getNsKey('POD') => $this->POD,
            Message::getNsKey('freight') => $this->freight,
            Message::getNsKey('fCurrency') => $this->fCurrency,
            Message::getNsKey('fFlag') => $this->fFlag,
            Message::getNsKey('insuredFee') => $this->insuredFee,
            Message::getNsKey('iCurrency') => $this->iCurrency,
            Message::getNsKey('iFlag') => $this->iFlag,
            Message::getNsKey('wrapType') => $this->wrapType,
            Message::getNsKey('packNo') => $this->packNo,
            Message::getNsKey('grossWeight') => $this->grossWeight,
            Message::getNsKey('netWeight') => $this->netWeight,
        ]);
    }
}