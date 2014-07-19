<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\TwilioAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwilioAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return TwilioAdapter
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new TwilioAdapter;

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['twilio']);

        return $adapter;
    }
}
