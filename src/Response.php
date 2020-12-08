<?php


namespace LCustoms;


use Exception;
use SimpleXMLElement;
use Throwable;

class Response
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
        try{
            libxml_use_internal_errors(true);
            $this->XMLElement = new SimpleXMLElement($xmlString);
        }catch (Exception | Throwable $exception){
            throw new Exception("xml is fail.");
        }
    }

    /**
     * @return SimpleXMLElement|null
     */
    public function getXMLElementName(): string
    {
        return $this->XMLElement->getName();
    }

    /**
     * @return array
     */
    public function getItems(){
        $count = $this->XMLElement->children()->count();
        $childrenArray = $childrenArray = ((array)$this->XMLElement->children())[$this->XMLElement->children()->getName()];

        if($count === 1){
            $childrenArray = [$childrenArray];
        }

        return array_map(function (SimpleXMLElement $element){
            return json_decode(json_encode($element), true);
        }, $childrenArray);
    }


}