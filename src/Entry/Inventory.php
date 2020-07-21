<?php


namespace LCustoms\Entry;


use LCustoms\Entry\Inventory\InventoryHead;
use LCustoms\Entry\Inventory\InventoryList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Inventory implements XmlSerializable
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
     * Inventory constructor.
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
    public function xmlSerialize(Writer $writer)
    {
        $writer->writeElement(Message::getNsKey('Inventory'), [
            array_merge([$this->inventoryHead], $this->inventoryList)
        ]);
    }

    /**
     * @param InventoryHead $inventoryHead
     * @return Inventory
     * @author luffyzhao@vip.126.com
     */
    public function setInventoryHead(InventoryHead $inventoryHead): Inventory
    {
        $this->inventoryHead = $inventoryHead;
        return $this;
    }

    /**
     * @param InventoryList $inventoryList
     * @return Inventory
     * @author luffyzhao@vip.126.com
     */
    public function addInventoryList(InventoryList $inventoryList): Inventory
    {
        $this->inventoryList[] = $inventoryList;
        return $this;
    }
}