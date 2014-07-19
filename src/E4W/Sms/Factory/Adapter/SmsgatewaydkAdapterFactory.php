<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\SmsgatewaydkAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmsgatewaydkAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SmsgatewaydkAdapter
     * @throws \Exception
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new SmsgatewaydkAdapter;

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['smsgatewaydk']);

        return $adapter;
    }
}
