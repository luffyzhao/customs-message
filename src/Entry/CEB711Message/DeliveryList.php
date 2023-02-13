<?php


namespace LCustoms\Entry\CEB711Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class DeliveryList implements XmlSerializable
{
    public $gnum;
    public $logisticsNo;
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
        $writer->writeElement(Message::getNsKey('DeliveryList'), [
            Message::getNsKey('gnum') => $this->gnum,
            Message::getNsKey('logisticsNo') => $this->logisticsNo,
            Message::getNsKey('note') => $this->note
        ]);
    }

}