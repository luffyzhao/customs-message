<?php


namespace LCustoms\Entry;


use LCustoms\Entry\CEB509Message\DepartureHead;
use LCustoms\Entry\CEB509Message\DepartureList;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB509Message implements XmlSerializable
{
    /**
     * @var DepartureHead
     * @author luffyzhao@vip.126.com
     */
    protected $departureHead;

    /**
     * @var DepartureList[]
     * @author luffyzhao@vip.126.com
     */
    protected $departureList = [];

    /**
     * CEB509Message constructor.
     * @param DepartureHead $departureHead
     * @author luffyzhao@vip.126.com
     */
    public function __construct(DepartureHead $departureHead)
    {
        $this->departureHead = $departureHead;
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
        $writer->writeElement(Message::getNsKey('Departure'), [
            array_merge([$this->departureHead], $this->departureList)
        ]);
    }

    /**
     * @return DepartureHead
     * @author luffyzhao@vip.126.com
     */
    public function getDepartureHead(): DepartureHead
    {
        return $this->departureHead;
    }

    /**
     * @param DepartureHead $departureHead
     * @return CEB509Message
     * @author luffyzhao@vip.126.com
     */
    public function setDepartureHead(DepartureHead $departureHead): CEB509Message
    {
        $this->departureHead = $departureHead;
        return $this;
    }

    /**
     * @return DepartureList[]
     * @author luffyzhao@vip.126.com
     */
    public function getDepartureList(): array
    {
        return $this->departureList;
    }

    /**
     * @param DepartureList[] $departureList
     * @return CEB509Message
     * @author luffyzhao@vip.126.com
     */
    public function setDepartureList(array $departureList): CEB509Message
    {
        foreach ($departureList as $item) {
            $this->addDepartureList($item);
        }
        return $this;
    }

    /**
     * @param DepartureList $departureList
     * @return CEB509Message
     * @author luffyzhao@vip.126.com
     */
    public function addDepartureList(DepartureList $departureList): CEB509Message
    {
        $this->departureList[] = $departureList;
        return $this;
    }
}