<?php


namespace LCustoms;


use LCustoms\Entry\Transfer;

class Message
{

    /**
     * @var Service
     * @author luffyzhao@vip.126.com
     */
    protected $service;
    /**
     * @var Transfer
     * @author luffyzhao@vip.126.com
     */
    private $transfer;

    /**
     * Message constructor.
     * @param Transfer $transfer
     * @author luffyzhao@vip.126.com
     */
    public function __construct(Transfer $transfer)
    {
        $this->service = new Service();
        $this->service->namespaceMap['http://www.chinaport.gov.cn/ceb'] = 'ceb';
        $this->service->namespaceMap['http://www.w3.org/2001/XMLSchema-instance'] = 'xsi';
        $this->transfer = $transfer;
    }

    /**
     * @param Entry\Inventory[] $inventory
     * @return string
     * @throws \Exception
     * @author luffyzhao@vip.126.com
     */
    public function map(array $inventory)
    {

        return $this->service->write(
            self::getNsKey('CEB621Message'),
            [
                array_merge($inventory, [$this->transfer])
            ]
        );
    }

    /**
     * @param $key
     * @return string
     * @author luffyzhao@vip.126.com
     */
    public static function getNsKey($key)
    {
        return "{http://www.chinaport.gov.cn/ceb}{$key}";
    }
}