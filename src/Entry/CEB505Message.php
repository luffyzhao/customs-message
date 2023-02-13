<?php


namespace LCustoms\Entry;


use LCustoms\Entry\CEB505Message\Logistics;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB505Message implements XmlSerializable
{

    /**
     * @var Logistics
     * @author luffyzhao@vip.126.com
     */
    protected $logistics;

    /**
     * CEB505Message constructor.
     * @param Logistics $logistics
     * @author luffyzhao@vip.126.com
     */
    public function __construct(Logistics $logistics)
    {
        $this->logistics = $logistics;
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
        $writer->writeElement(Message::getNsKey('Logistics'), $this->logistics->getBody());
    }

    /**
     * @param Logistics $logistics
     * @return CEB505Message
     * @author luffyzhao@vip.126.com
     */
    public function setLogistics(Logistics $logistics): CEB505Message
    {
        $this->logistics = $logistics;
        return $this;
    }
}