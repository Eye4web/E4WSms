<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\BulkSmsAdapter;
use E4W\Sms\Adapter\Sms\SureSmsAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BulkSmsAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SureSmsAdapter
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new BulkSmsAdapter();

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['bulkSms']);

        return $adapter;
    }
}
