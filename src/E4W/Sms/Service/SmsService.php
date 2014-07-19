<?php
namespace E4W\Sms\Service;

use E4W\Sms\Adapter\Sms\SmsAdapterInterface;

class SmsService
{
    /** @var SmsAdapterInterface */
    protected $adapter;

    /**
     * Send message
     *
     * @param $to
     * @param $text
     * @param string $from
     * @return mixed
     */
    public function send($to, $text, $from = null)
    {
        return $this->adapter->send($to, $text, $from);
    }

    public function receive(array $data)
    {
        if (!method_exists($this->adapter, 'receive')) {
            throw new \Exception('The adapter does not support two-ways sms');
        }

        return $this->adapter->receive($data);
    }

    /**
     * Set adapter
     *
     * @param SmsAdapterInterface $adapter
     */
    public function setAdapter(SmsAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return SmsAdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}
