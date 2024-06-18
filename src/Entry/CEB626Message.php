<?php


namespace LCustoms\Entry;


use LCustoms\Entry;
use LCustoms\Entry\CEB626Message\InvtRefundReturn;
use LCustoms\Message;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class CEB626Message  extends Entry implements XmlSerializable
{

    /**
     * @var InvtRefundReturn
     * @author luffyzhao@vip.126.com
     */
    protected $return;

    /**
     * CEB505Message constructor.
     * @param InvtRefundReturn $return
     * @author luffyzhao@vip.126.com
     */
    public function __construct(InvtRefundReturn $return)
    {
        $this->return = $return;
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
        $writer->writeElement(Message::getNsKey('InvtRefundReturn'), $this->return->getBody());
    }

    /**
     * @param InvtRefundReturn $return
     * @return CEB626Message
     * @author luffyzhao@vip.126.com
     */
    public function setReturn(InvtRefundReturn $return): CEB626Message
    {
        $this->return = $return;
        return $this;
    }
}