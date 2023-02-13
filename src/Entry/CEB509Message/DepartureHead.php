<?php


namespace LCustoms\Entry\CEB509Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class DepartureHead
    implements XmlSerializable
{
    public $guid;
    public $appType;
    public $appTime;
    public $appStatus;
    public $customsCode;
    public $copNo;
    public $logisticsCode;
    public $logisticsName;
    public $trafMode;
    public $trafName;
    public $voyageNo;
    public $billNo;
    public $leaveTime;
    public $msgCount;
    public $msgSeqNo;
    public $note;


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
        $writer->writeElement(Message::getNsKey('DepartureHead'), [
            Message::getNsKey('guid') => $this->guid,
            Message::getNsKey('appType') => $this->appType,
            Message::getNsKey('appTime') => $this->appTime,
            Message::getNsKey('appStatus') => $this->appStatus,
            Message::getNsKey('customsCode') => $this->customsCode,
            Message::getNsKey('copNo') => $this->copNo,
            Message::getNsKey('logisticsCode') => $this->logisticsCode,
            Message::getNsKey('logisticsName') => $this->logisticsName,
            Message::getNsKey('trafMode') => $this->trafMode,
            Message::getNsKey('trafName') => $this->trafName,
            Message::getNsKey('voyageNo') => $this->voyageNo,
            Message::getNsKey('billNo') => $this->billNo,
            Message::getNsKey('leaveTime') => $this->leaveTime,
            Message::getNsKey('msgCount') => $this->msgCount,
            Message::getNsKey('msgSeqNo') => $this->msgSeqNo,
            Message::getNsKey('note') => $this->note,
        ]);
    }
}