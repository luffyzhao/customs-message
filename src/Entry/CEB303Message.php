<?php


namespace LCustoms\Entry;


use LCustoms\Entry;
use LCustoms\Entry\CEB303Message\OrderHead;
use LCustoms\Entry\CEB303Message\OrderList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB303Message extends Entry implements XmlSerializable
{
    /**
     * @var OrderHead
     * @author luffyzhao@vip.126.com
     */
    protected $orderHead;

    /**
     * @var OrderList[]
     * @author luffyzhao@vip.126.com
     */
    protected $orderList = [];

    /**
     * CEB621Message constructor.
     * @param OrderHead $orderHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(OrderHead $orderHead)
    {
        $this->orderHead = $orderHead;
    }

    /**
     * @param OrderHead $orderHead
     * @return CEB303Message
     * @author luffyzhao@vip.126.com
     */
    public function setOrderHead(OrderHead $orderHead): CEB303Message
    {
        $this->orderHead = $orderHead;
        return $this;
    }

    /**
     * @param array $orderList
     * @return CEB303Message
     * @author luffyzhao@vip.126.com
     */
    public function setOrderList(array $orderList): CEB303Message
    {
        foreach ($orderList as $item) {
            $this->addOrderList($item);
        }
        return $this;
    }

    /**
     * @param OrderList $orderList
     * @return $this
     * @author luffyzhao@vip.126.com
     */
    public function addOrderList(OrderList $orderList): CEB303Message
    {
        $this->orderList[] = $orderList;
        return $this;
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
        $writer->writeElement(Message::getNsKey('Order'), [
            array_merge([$this->orderHead], $this->orderList)
        ]);
    }
}