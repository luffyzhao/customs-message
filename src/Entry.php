<?php

namespace LCustoms;

use LCustoms\Entry\Transfer;

abstract class Entry
{
    /** @var Transfer */
    private $transfer;

    /**
     * @return Service
     */
    private function setService()
    {
        $service = new Service();
        $service->namespaceMap['http://www.chinaport.gov.cn/ceb'] = 'ceb';
        $service->namespaceMap['http://www.w3.org/2001/XMLSchema-instance'] = 'xsi';
        return $service;
    }

    /**
     * @param $key
     * @return string
     * @author luffyzhao@vip.126.com
     */
    private static function getNsKey($key)
    {
        return "{http://www.chinaport.gov.cn/ceb}{$key}";
    }


    /**
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        $service = $this->setService();
        return (string)$service->write(
            self::getNsKey(basename(get_class($this))),
            [
                [$this, $this->transfer]
            ]
        );
    }

    /**
     * @return Transfer
     */
    public function getTransfer()
    {
        return $this->transfer;
    }

    /**
     * @param Transfer $transfer
     */
    public function setTransfer(Transfer $transfer): void
    {
        $this->transfer = $transfer;
    }


}