<?php


namespace LCustoms\Entry;


use LCustoms\Entry;
use LCustoms\Entry\CEB403Message\Receipts;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB403Message  extends Entry implements XmlSerializable
{
    /**
     * @var Receipts
     * @author luffyzhao@vip.126.com
     */
    protected $receipts;

    /**
     * CEB403Message constructor.
     * @param Receipts $receipts
     * @author luffyzhao@vip.126.com
     */
    public function __construct(Receipts $receipts)
    {
        $this->receipts = $receipts;
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
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeElement(Message::getNsKey('Receipts'), $this->receipts->getBody());
    }

    /**
     * @param Receipts $receipts
     * @return CEB403Message
     * @author luffyzhao@vip.126.com
     */
    public function setReceipts(Receipts $receipts): CEB403Message
    {
        $this->receipts = $receipts;
        return $this;
    }
}