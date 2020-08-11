<?php


namespace LCustoms\Entry;


use LCustoms\Entry\CEB607Message\WayBillHead;
use LCustoms\Entry\CEB607Message\WayBillList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB607Message implements XmlSerializable
{

    /**
     * @var WayBillHead
     * @author luffyzhao@vip.126.com
     */
    protected $wayBillHead;

    /**
     * @var WayBillList[]
     * @author luffyzhao@vip.126.com
     */
    protected $wayBillLists = [];

    /**
     * CEB607Message constructor.
     * @param WayBillHead $wayBillHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(WayBillHead $wayBillHead)
    {
        $this->wayBillHead = $wayBillHead;
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
        $writer->writeElement(Message::getNsKey('WayBill'), [
            array_merge([$this->wayBillHead], $this->wayBillLists)
        ]);
    }

    /**
     * @return WayBillHead
     * @author luffyzhao@vip.126.com
     */
    public function getWayBillHead(): WayBillHead
    {
        return $this->wayBillHead;
    }

    /**
     * @param WayBillHead $wayBillHead
     * @author luffyzhao@vip.126.com
     */
    public function setWayBillHead(WayBillHead $wayBillHead): void
    {
        $this->wayBillHead = $wayBillHead;
    }

    /**
     * @param WayBillList[] $wayBillLists
     * @return CEB607Message
     * @author luffyzhao@vip.126.com
     */
    public function setWayBillLists(array $wayBillLists): CEB607Message
    {
        foreach ($wayBillLists as $wayBillList) {
            $this->addWayBillLists($wayBillList);
        }
        return $this;
    }

    /**
     * @param WayBillList $wayBillList
     * @return CEB607Message
     * @author luffyzhao@vip.126.com
     */
    public function addWayBillLists(WayBillList $wayBillList): CEB607Message
    {
        $this->wayBillLists[] = $wayBillList;
        return $this;
    }

}