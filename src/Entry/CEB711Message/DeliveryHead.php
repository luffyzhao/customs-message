<?php


namespace LCustoms\Entry\CEB711Message;


use Carbon\Carbon;
use LCustoms\Message;
use Ramsey\Uuid\Uuid;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class DeliveryHead implements XmlSerializable
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $customsCode;
    public $copNo;
    public $preNo;
    public $rkdNo;
    public $operatorCode;
    public $operatorName;
    public $ieFlag;
    public $trafMode;
    public $trafNo;
    public $voyageNo;
    public $billNo;
    public $logisticsCode;
    public $logisticsName;
    public $unloadLocation;
    public $note;


    public function __construct()
    {
        try {
            $this->guid = uuid::uuid6()->toString();
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
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeElement(Message::getNsKey('InventoryHead'), [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('customsCode') => $this->customsCode,
            Message::getNsKey('copNo') => $this->copNo,
            Message::getNsKey('preNo') => $this->preNo,
            Message::getNsKey('rkdNo') => $this->rkdNo,
            Message::getNsKey('operatorCode') => $this->operatorCode,
            Message::getNsKey('operatorName') => $this->operatorName,
            Message::getNsKey('ieFlag') => $this->ieFlag,
            Message::getNsKey('trafMode') => $this->trafMode,
            Message::getNsKey('trafNo') => $this->trafNo,
            Message::getNsKey('voyageNo') => $this->voyageNo,
            Message::getNsKey('billNo') => $this->billNo,
            Message::getNsKey('logisticsCode') => $this->logisticsCode,
            Message::getNsKey('logisticsName') => $this->logisticsName,
            Message::getNsKey('unloadLocation') => $this->unloadLocation,
            Message::getNsKey('note') => $this->note
        ]);
    }
}