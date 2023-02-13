<?php

namespace LCustoms;

use Exception;
use LCustoms\Receipts\ReceiptItem;
use SimpleXMLElement;
use Throwable;

class Receipt
{
    /**
     * @var SimpleXMLElement|null
     */
    protected $XMLElement = null;

    /**
     * Response constructor.
     * @param string $xmlString
     * @throws Exception
     */
    public function __construct(string $xmlString)
    {
        try {
            libxml_use_internal_errors(true);
            $this->XMLElement = new SimpleXMLElement($xmlString);
        } catch (Exception|Throwable $exception) {
            throw new Exception("xml is fail.");
        }
    }

    public function toArray()
    {
        $count = $this->XMLElement->children()->count();
        $childrenArray = ((array)$this->XMLElement->children())[$this->XMLElement->children()->getName()];
        if ($count === 1) {
            $childrenArray = [$childrenArray];
        }

        $array = [];
        foreach ($childrenArray as $value) {
            $array[] = $this->handleClass($this->XMLElement->getName(), $value);
        }

        return $array;
    }

    /**
     * @param string $name
     * @param SimpleXMLElement $element
     * @return ReceiptItem
     */
    private function handleClass(string $name, SimpleXMLElement $element)
    {
        $class = "\\LCustoms\\Receipts\\" . $name;
        return new $class($element);
    }
}