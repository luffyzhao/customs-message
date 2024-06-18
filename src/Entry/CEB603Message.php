<?php


namespace LCustoms\Entry;


use LCustoms\Entry;
use LCustoms\Entry\CEB603Message\InventoryHead;
use LCustoms\Entry\CEB603Message\InventoryList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB603Message  extends Entry implements XmlSerializable
{
    /**
     * @var InventoryHead
     * @author luffyzhao@vip.126.com
     */
    protected $inventoryHead;
    /**
     * @var InventoryList[]
     * @author luffyzhao@vip.126.com
     */
    protected $inventoryList = [];

    /**
     * CEB621Message constructor.
     * @param InventoryHead $inventoryHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(InventoryHead $inventoryHead)
    {
        $this->inventoryHead = $inventoryHead;
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
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeElement(Message::getNsKey('Inventory'), [
            array_merge([$this->inventoryHead], $this->inventoryList)
        ]);
    }

    /**
     * @param InventoryHead $inventoryHead
     * @return CEB603Message
     * @author luffyzhao@vip.126.com
     */
    public function setInventoryHead(InventoryHead $inventoryHead): CEB603Message
    {
        $this->inventoryHead = $inventoryHead;
        return $this;
    }

    /**
     * @param InventoryList $inventoryList
     * @return CEB603Message
     * @author luffyzhao@vip.126.com
     */
    public function addInventoryList(InventoryList $inventoryList): CEB603Message
    {
        $this->inventoryList[] = $inventoryList;
        return $this;
    }

    /**
     * @param InventoryHead[] $inventoryLists
     * @return CEB603Message
     * @author luffyzhao@vip.126.com
     */
    public function setInventoryList(array $inventoryLists): CEB603Message
    {
        foreach ($inventoryLists as $item) {
            $this->addInventoryList($item);
        }
        return $this;
    }
}