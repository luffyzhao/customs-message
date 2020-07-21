<?php


namespace LCustoms\Entry\Inventory;


use LCustoms\Message;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InventoryHead  implements XmlSerializable
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $orderNo;
    public $ebpCode;
    public $ebpName;
    public $ebcCode;
    public $ebcName;
    public $logisticsNo;
    public $logisticsCode;
    public $logisticsName;
    public $copNo;
    public $preNo;
    public $assureCode;
    public $emsNo;
    public $invtNo;
    public $ieFlag;
    public $declTime;
    public $customsCode;
    public $portCode;
    public $ieDate;
    public $buyerIdType;
    public $buyerIdNumber;
    public $buyerName;
    public $buyerTelephone;
    public $consigneeAddress;
    public $agentCode;
    public $agentName;
    public $areaCode;
    public $areaName;
    public $tradeMode;
    public $trafMode;
    public $trafNo;
    public $voyageNo;
    public $billNo;
    public $loctNo;
    public $licenseNo;
    public $country;
    public $freight;
    public $insuredFee;
    public $currency;
    public $wrapType;
    public $packNo;
    public $grossWeight;
    public $netWeight;
    public $note;

    public function __construct()
    {
        try {
            $this->guid = Uuid::uuid4()->toString();
        } catch (\Exception $e) {
        }
        $this->appTime = Carbon::now()->format('YmdHis');
        $this->appStatus = 2;
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
        $writer->writeElement(Message::getNsKey('InventoryHead'), [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('orderNo') => $this->orderNo,
            Message::getNsKey('ebpCode') => $this->ebpCode,
            Message::getNsKey('ebpName') => $this->ebpName,
            Message::getNsKey('ebcCode') => $this->ebcCode,
            Message::getNsKey('ebcName') => $this->ebcName,
            Message::getNsKey('logisticsNo') => $this->logisticsNo,
            Message::getNsKey('logisticsCode') => $this->logisticsCode,
            Message::getNsKey('logisticsName') => $this->logisticsName,
            Message::getNsKey('copNo') => $this->copNo,
            Message::getNsKey('preNo') => $this->preNo,
            Message::getNsKey('assureCode') => $this->assureCode,
            Message::getNsKey('emsNo') => $this->emsNo,
            Message::getNsKey('invtNo') => $this->invtNo,
            Message::getNsKey('ieFlag') => $this->ieFlag,
            Message::getNsKey('declTime') => $this->declTime,
            Message::getNsKey('customsCode') => $this->customsCode,
            Message::getNsKey('portCode') => $this->portCode,
            Message::getNsKey('ieDate') => $this->ieDate,
            Message::getNsKey('buyerIdType') => $this->buyerIdType,
            Message::getNsKey('buyerIdNumber') => $this->buyerIdNumber,
            Message::getNsKey('buyerName') => $this->buyerName,
            Message::getNsKey('buyerTelephone') => $this->buyerTelephone,
            Message::getNsKey('consigneeAddress') => $this->consigneeAddress,
            Message::getNsKey('agentCode') => $this->agentCode,
            Message::getNsKey('agentName') => $this->agentName,
            Message::getNsKey('areaCode') => $this->areaCode,
            Message::getNsKey('areaName') => $this->areaName,
            Message::getNsKey('tradeMode') => $this->tradeMode,
            Message::getNsKey('trafMode') => $this->trafMode,
            Message::getNsKey('trafNo') => $this->trafNo,
            Message::getNsKey('voyageNo') => $this->voyageNo,
            Message::getNsKey('billNo') => $this->billNo,
            Message::getNsKey('loctNo') => $this->loctNo,
            Message::getNsKey('licenseNo') => $this->licenseNo,
            Message::getNsKey('country') => $this->country,
            Message::getNsKey('freight') => $this->freight,
            Message::getNsKey('insuredFee') => $this->insuredFee,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('wrapType') => $this->wrapType,
            Message::getNsKey('packNo') => $this->packNo,
            Message::getNsKey('grossWeight') => $this->grossWeight,
            Message::getNsKey('netWeight') => $this->netWeight,
            Message::getNsKey('note') => $this->note,
        ]);
    }
}