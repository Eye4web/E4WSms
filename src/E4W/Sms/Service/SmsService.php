<?php
namespace E4W\Sms\Service;

use E4W\Sms\Adapter\Sms\SmsAdapterInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class SmsService implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

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
        $this->getEventManager()->trigger('send', $this, [
            'to' => $to,
            'text' => $text,
            'from' => $from,
        ]);

        return $this->adapter->send($to, $text, $from);
    }

    public function receive(array $data)
    {
        if (!method_exists($this->adapter, 'receive')) {
            throw new \Exception('The adapter does not support two-ways sms');
        }
        $this->getEventManager()->trigger('receive', $this, [
            'data' => $data,
        ]);

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
