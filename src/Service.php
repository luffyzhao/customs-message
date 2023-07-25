<?php


namespace LCustoms;


use Ramsey\Uuid\Uuid;

class Service extends \Sabre\Xml\Service
{
    /**
     * @param string $rootElementName
     * @param array|object|\Sabre\Xml\XmlSerializable|string $value
     * @param string|null $contextUri
     * @return string
     * @throws \Exception
     * @author luffyzhao@vip.126.com
     */
    public function write(string $rootElementName, $value, string $contextUri = null): string
    {
        $w = $this->getWriter();
        $w->openMemory();
        $w->contextUri = $contextUri;

        $w->setIndent(true);
        $w->startDocument('1.0', 'UTF-8', 'yes');

        $w->startElement($rootElementName);

        $w->startAttribute('guid');
        $w->text(uuid::uuid6()->toString());
        $w->endAttribute();
        $w->startAttribute('version');
        $w->text('1.0');
        $w->endAttribute();

        if (!is_null($value)) {
            $w->write($value);
        }
        $w->endElement();


        return $w->outputMemory();
    }
}