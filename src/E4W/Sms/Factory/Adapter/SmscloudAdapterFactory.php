<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\SmscloudAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmscloudAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SmscloudAdapter
     * @throws \Exception
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new SmscloudAdapter;

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['smscloud']);

        return $adapter;
    }
}
