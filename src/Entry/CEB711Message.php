<?php


namespace LCustoms\Entry;


use LCustoms\Entry\CEB711Message\DeliveryHead;
use LCustoms\Entry\CEB711Message\DeliveryList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB711Message  implements XmlSerializable
{
    /**
     * @var DeliveryHead
     * @author luffyzhao@vip.126.com
     */
    protected $deliveryHead;

    /**
     * @var DeliveryList[]
     * @author luffyzhao@vip.126.com
     */
    protected $deliveryList;

    /**
     * CEB711Message constructor.
     * @param DeliveryHead $deliveryHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(DeliveryHead $deliveryHead)
    {
        $this->deliveryHead = $deliveryHead;
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
    public function xmlSerialize(Writer $writer)
    {
        $writer->writeElement(Message::getNsKey('Delivery'), [
            array_merge([$this->deliveryHead], $this->deliveryList)
        ]);
    }

    /**
     * @param array $deliveryList
     * @return CEB711Message
     * @author luffyzhao@vip.126.com
     */
    public function setDeliveryList(array $deliveryList): CEB711Message
    {
        foreach ($deliveryList as $item){
            $this->addDeliveryList($item);
        }
        return $this;
    }

    /**
     * @return array
     * @author luffyzhao@vip.126.com
     */
    public function getDeliveryList(): array
    {
        return $this->deliveryList;
    }

    /**
     * @param DeliveryList $deliveryList
     * @return CEB711Message
     * @author luffyzhao@vip.126.com
     */
    public function addDeliveryList(DeliveryList $deliveryList){
        $this->deliveryList[] = $deliveryList;
        return $this;
    }

    /**
     * @return DeliveryHead
     * @author luffyzhao@vip.126.com
     */
    public function getDeliveryHead(): DeliveryHead
    {
        return $this->deliveryHead;
    }

    /**
     * @param DeliveryHead $deliveryHead
     * @author luffyzhao@vip.126.com
     */
    public function setDeliveryHead(DeliveryHead $deliveryHead): void
    {
        $this->deliveryHead = $deliveryHead;
    }


}