<?php


namespace LCustoms\Entry\CEB603Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InventoryList implements XmlSerializable
{

    public $gnum;
    public $itemNo;
    public $itemName;
    public $gcode;
    public $gname;
    public $gmodel;
    public $barCode;
    public $country;
    public $currency;
    public $qty;
    public $qty1;
    public $unit;
    public $unit1;
    public $price;
    public $totalPrice;

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
        $writer->writeElement('InventoryList', [
            Message::getNsKey('gnum') => $this->gnum,
            Message::getNsKey('itemNo') => $this->itemNo,
            Message::getNsKey('itemName') => $this->itemName,
            Message::getNsKey('gcode') => $this->gcode,
            Message::getNsKey('gname') => $this->gname,
            Message::getNsKey('gmodel') => $this->gmodel,
            Message::getNsKey('barCode') => $this->barCode,
            Message::getNsKey('country') => $this->country,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('qty') => $this->qty,
            Message::getNsKey('qty1') => $this->qty1,
            Message::getNsKey('unit') => $this->unit,
            Message::getNsKey('unit1') => $this->unit1,
            Message::getNsKey('price') => $this->price,
            Message::getNsKey('totalPrice') => $this->totalPrice,
        ]);
    }
}