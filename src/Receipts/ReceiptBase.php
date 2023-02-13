<?php

namespace LCustoms\Receipts;

use SimpleXMLElement;

abstract class ReceiptBase implements ReceiptItem
{
    /**
     * @var SimpleXMLElement|null
     */
    protected $element;

    /**
     * @param SimpleXMLElement|null $element
     */
    public function __construct(SimpleXMLElement $element = null)
    {
        if ($element !== null) {
            foreach ($element->children() as $item) {
                if (property_exists($this, $item->getName())) {
                    $this->{$item->getName()} = (string)$item;
                }
            }
        }

        $this->element = $element;
    }

    public function __toString()
    {
        if ($this->element !== null) {
            return '<CEB622Message>' . $this->element->asXML() . '</CEB622Message>';
        }
    }
}