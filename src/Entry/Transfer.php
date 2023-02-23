<?php


namespace LCustoms\Entry;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Transfer implements XmlSerializable
{
    public $copCode;
    public $copName;
    public $dxpMode;
    public $dxpId;
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
        $writer->writeElement(Message::getNsKey('BaseTransfer'), [
            Message::getNsKey('copCode') => $this->copCode,
            Message::getNsKey('copName') => $this->copName,
            Message::getNsKey('dxpMode') => $this->dxpMode,
            Message::getNsKey('dxpId') => $this->dxpId,
            Message::getNsKey('note') => $this->note
        ]);
    }
}