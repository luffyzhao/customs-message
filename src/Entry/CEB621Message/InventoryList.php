<?php


namespace LCustoms\Entry\CEB621Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InventoryList  implements XmlSerializable
{
    public $gnum;
    public $itemRecordNo;
    public $itemNo;
    public $itemName;
    public $gcode;
    public $gname;
    public $gmodel;
    public $barCode;
    public $country;
    public $currency;
    public $qty;
    public $unit;
    public $qty1;
    public $unit1;
    public $qty2;
    public $unit2;
    public $price;
    public $totalPrice;
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
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeElement('InventoryList', [
            Message::getNsKey('gnum') => $this->gnum,
            Message::getNsKey('itemRecordNo') => $this->itemRecordNo,
            Message::getNsKey('itemNo') => $this->itemNo,
            Message::getNsKey('itemName') => $this->itemName,
            Message::getNsKey('gcode') => $this->gcode,
            Message::getNsKey('gname') => $this->gname,
            Message::getNsKey('gmodel') => $this->gmodel,
            Message::getNsKey('barCode') => $this->barCode,
            Message::getNsKey('country') => $this->country,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('qty') => $this->qty,
            Message::getNsKey('unit') => $this->unit,
            Message::getNsKey('qty1') => $this->qty1,
            Message::getNsKey('unit1') => $this->unit1,
            Message::getNsKey('qty2') => $this->qty2,
            Message::getNsKey('unit2') => $this->unit2,
            Message::getNsKey('price') => $this->price,
            Message::getNsKey('totalPrice') => $this->totalPrice,
            Message::getNsKey('note') => $this->note,
        ]);
    }
}