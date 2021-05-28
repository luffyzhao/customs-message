<?php


namespace LCustoms\Entry\CEB311Message;


use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class OrderList  implements XmlSerializable
{
    public $gnum;
    public $itemNo;
    public $itemName;
    public $gmodel;
    public $unit;
    public $qty;
    public $price;
    public $totalPrice;
    public $currency;
    public $country;

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
        $writer->writeElement('OrderList', [
            Message::getNsKey('gnum') => $this->gnum,
            Message::getNsKey('itemNo') => $this->itemNo,
            Message::getNsKey('itemName') => $this->itemName,
            Message::getNsKey('gmodel') => $this->gmodel,
            Message::getNsKey('unit') => $this->unit,
            Message::getNsKey('qty') => $this->qty,
            Message::getNsKey('price') => $this->price,
            Message::getNsKey('totalPrice') => $this->totalPrice,
            Message::getNsKey('currency') => $this->currency,
            Message::getNsKey('country') => $this->country,
        ]);
    }
}
