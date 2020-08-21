<?php


namespace LCustoms\Entry;


use LCustoms\Entry\CEB625Message\InvtRefundHead;
use LCustoms\Entry\CEB625Message\InvtRefundList;
use LCustoms\Entry\Inventory\InventoryList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB625Message implements XmlSerializable
{
    /**
     * @var InvtRefundHead
     * @author luffyzhao@vip.126.com
     */
    private $invtRefundHead;

    /**
     * @var InventoryList[]
     * @author luffyzhao@vip.126.com
     */
    protected $invtRefundList;

    /**
     * CEB625Message constructor.
     * @param InvtRefundHead $invtRefundHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(InvtRefundHead $invtRefundHead)
    {
        $this->invtRefundHead = $invtRefundHead;
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
        $writer->writeElement(Message::getNsKey('InvtRefund'), [
            array_merge([$this->invtRefundHead], $this->invtRefundList)
        ]);
    }

    /**
     * @return InventoryList[]
     * @author luffyzhao@vip.126.com
     */
    public function getInvtRefundList(): array
    {
        return $this->invtRefundList;
    }

    /**
     * @param InventoryList[] $invtRefundLists
     * @return CEB625Message
     * @author luffyzhao@vip.126.com
     */
    public function setInvtRefundList(array $invtRefundLists): CEB625Message
    {
        foreach ($invtRefundLists as $invtRefundList) {
            $this->addInvtRefundList($invtRefundList);
        }
        return $this;
    }

    /**
     * @param InvtRefundList $invtRefundList
     * @return CEB625Message
     * @author luffyzhao@vip.126.com
     */
    public function addInvtRefundList(InvtRefundList $invtRefundList): CEB625Message
    {
        $this->invtRefundList[] = $invtRefundList;
        return $this;
    }
}