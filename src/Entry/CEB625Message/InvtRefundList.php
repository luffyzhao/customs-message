<?php


namespace LCustoms\Entry\CEB625Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InvtRefundList implements XmlSerializable
{
    public $gnum;
    public $gcode;
    public $gname;
    public $qty;
    public $unit;

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
        $writer->writeElement('InvtRefundList', [
            Message::getNsKey('gnum') => $this->gnum,
            Message::getNsKey('gcode') => $this->gcode,
            Message::getNsKey('gname') => $this->gname,
            Message::getNsKey('qty') => $this->qty,
            Message::getNsKey('unit') => $this->unit,
        ]);
    }
}