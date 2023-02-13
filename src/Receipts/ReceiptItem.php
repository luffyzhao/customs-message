<?php

namespace LCustoms\Receipts;

use SimpleXMLElement;

interface ReceiptItem
{
    public function __construct(SimpleXMLElement $element = null);
}